<?php

namespace App\Services;
use App\Repositories\Interfaces\AttributeVariationRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Services\Interfaces\ProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductService implements ProductServiceInterface
{
    protected $productRepository;
    protected $attributeVariationRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        AttributeVariationRepositoryInterface $attributeVariationRepository
    ) {
        $this->productRepository = $productRepository;
        $this->attributeVariationRepository = $attributeVariationRepository;
    }


    public function store($request)
    {
        DB::beginTransaction();
        $data = $request->validated();

        $categories = $data['category_id'];
        $type = $data['type'];

        unset($data['category_id']);
        if (isset($data['gallery'])) {
            $data['gallery'] = json_encode($data['gallery']);
        }

        switch ($type) {
            case 1:
                $product = $this->productRepository->create($data);
                $product->categories()->sync($categories);

                DB::commit();
                break;
            case 2:

                break;

            default:
                break;
        }
    }

    public function updateStatus($request)
    {
        $data = $request->all();
        $productId = $data['product_id'];
        unset($data['product_id']);

        return $this->productRepository->update($productId, $data);

    }


    public function createProductVariations(Request $request, array $view)
    {
        $data = $request->all();

        $attribute_id = $data['attribute_id'];
        $type = $data['type'];
        $attributeVariations = $data['attribute_variation_ids'];

        switch ($type) {
            case 1:
                return 1;
                break;
            case 2:
                return 2;
                break;
            default:
                break;
        }
    }


}
