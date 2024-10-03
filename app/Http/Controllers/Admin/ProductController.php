<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Repositories\Interfaces\AttributeRepositoryInterface;
use App\Repositories\Interfaces\AttributeVariationRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
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
        $attributes = $this->attributeRepository->getAll();
        $attributeVariations = $this->attributeVariationRepository->getAll();
        // dd($attributeVariations);
        return view('admin.product.create', compact('categories', 'attributes', 'attributeVariations'));
    }

    public function store(ProductStoreRequest $request)
    {
        $this->productService->store($request);
        notyf()->success('Thêm sản phẩm thành công');
        return redirect()->route('admin.product.index');
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
            $request,
            $this->view()
        );

        return $instance;
    }
}