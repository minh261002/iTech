<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Resources\Admin\ProductResource;
use App\Repositories\Interfaces\AttributeRepositoryInterface;
use App\Repositories\Interfaces\AttributeVariationRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\Product\ProductRepositoryInterface;
use App\Services\Interfaces\ProductServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;
    protected $productService;
    protected $categoryRepository;
    protected $attributeRepository;
    protected $attributeVariationRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        ProductServiceInterface $productService,
        CategoryRepositoryInterface $categoryRepository,
        AttributeRepositoryInterface $attributeRepository,
        AttributeVariationRepositoryInterface $attributeVariationRepository

    ) {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
        $this->categoryRepository = $categoryRepository;
        $this->attributeRepository = $attributeRepository;
        $this->attributeVariationRepository = $attributeVariationRepository;
    }

    public function index(): View
    {
        $products = $this->productRepository->getAll();
        return view('admin.product.index', compact('products'));
    }

    public function create(): View
    {
        $categories = $this->categoryRepository->getFlatTree();
        $attributes = $this->attributeRepository->getAllPluckById();
        return view('admin.product.create', compact('categories', 'attributes', ));
    }

    public function store(ProductStoreRequest $request)
    {
        // dd($request['product_attribute']['attribute_id']);
        $this->productService->store($request);
        notyf()->success('Thêm sản phẩm thành công');
        return redirect()->route('admin.product.index');
    }

    public function edit($id, Request $request): View
    {
        $product = $this->productRepository->loadRelations($this->productRepository->findOrFail($id), [
            'categories:id',
            'productAttributes' => function ($query) {
                return $query->with(['attribute.variations', 'attributeVariations:id']);
            },
            'productVariations.attributeVariations'
        ]);

        $product = new ProductResource($product);
        $categories = $this->categoryRepository->getFlatTree();
        $attributes = $this->attributeRepository->getAllPluckById();

        $product = (object) $product->toArray($request);

        return view(
            'admin.product.edit',
            [
                'product' => $product,
                'categories' => $categories,
                'attributes' => $attributes,
            ]
        );
    }

    public function updateStatus(Request $request)
    {
        $this->productService->updateStatus($request);

        return response()->json(['status' => 'success']);
    }

    public function getAttribute(Request $request)
    {
        $response = $this->attributeRepository->findOrFailWithVariations($request->attribute_id);
        return view('admin.product.components.box_attribute', compact('response'));
    }

    public function checkAttribute(Request $request)
    {
        return view('admin.product.components.box_variation');
    }

    public function view()
    {
        return [
            'no_variation' => 'admin.product.components.no-variation',
        ];
    }

    public function createVariation(Request $request)
    {
        $instance = $this->productService->createProductVariations(
            $request
        );

        return $instance;
    }
}