<?php

namespace App\Services;
use App\Repositories\Interfaces\AttributeVariationRepositoryInterface;
use App\Repositories\Interfaces\Product\ProductAttributeRepositoryInterface;
use App\Repositories\Interfaces\Product\ProductRepositoryInterface;
use App\Repositories\Interfaces\Product\ProductVariationRepositoryInterface;
use App\Services\Interfaces\ProductServiceInterface;
use App\Traits\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ProductService implements ProductServiceInterface
{
    use Setup;
    protected $data;

    protected $repository;
    protected $repositoryAttributeVariation;
    protected $repositoryProductAttribute;
    protected $repositoryProductVariation;


    public function __construct(
        ProductRepositoryInterface $repository,
        AttributeVariationRepositoryInterface $repositoryAttributeVariation,
        ProductAttributeRepositoryInterface $repositoryProductAttribute,
        ProductVariationRepositoryInterface $repositoryProductVariation,
    ) {
        $this->repository = $repository;
        $this->repositoryAttributeVariation = $repositoryAttributeVariation;
        $this->repositoryProductAttribute = $repositoryProductAttribute;
        $this->repositoryProductVariation = $repositoryProductVariation;
    }

    public function store($request)
    {
        DB::beginTransaction();
        $this->data = $request->validated();

        $categories = $this->data['category_id'];

        unset($this->data['category_id']);
        if (isset($this->data['gallery'])) {
            $this->data['gallery'] = json_encode($this->data['gallery']);
        }

        $product = $this->repository->create($this->data['product']);
        $product->categories()->sync($categories);

        if ($product->type == 2 && isset($this->data['product_attribute']) && $this->data['product_attribute']) {
            $this->repositoryProductAttribute->createOrUpdateWithVariation($product->id, $this->data['product_attribute']);

            $this->storeOrUpdateProductVariations($product->id);
        }

        DB::commit();
    }

    public function updateStatus($request)
    {
        $this->data = $request->all();
        $productId = $this->data['product_id'];
        unset($data['product_id']);

        return $this->repository->update($productId, $this->data);

    }

    protected function storeOrUpdateProductVariations($product_id)
    {
        if (isset($this->data['products_variations']['attribute_variation_id']) && $this->data['products_variations']['attribute_variation_id']) {
            $attribute_variation_id = collect($this->data['product_attribute']['attribute_variation_id'])->collapse()->flip();

            foreach ($this->data['products_variations']['attribute_variation_id'] as $key => $item) {
                if (!$attribute_variation_id->has($item)) {
                    unset($this->data['products_variations']['attribute_variation_id'][$key]);
                }
            }
            $this->repositoryProductVariation->createOrUpdateWithVariation($product_id, $this->data['products_variations']);
        }
    }

    public function createProductVariations(Request $request)
    {

        $data = $request->all();
        $attributeVariations = $this->repositoryAttributeVariation->getOrderByFollow($data['product_attribute']['attribute_variation_id']);

        $indentity = rand(000000, 999999);
        if ($data['variation_action'] == 1) {

            $response = view(
                'admin.product.components.box_item_variation',
                compact('attributeVariations', )
            )->render();


        } elseif ($data['variation_action'] == 2) {
            $collect = collect($attributeVariations[0]->keys()->all());
            $arr = [];

            foreach ($attributeVariations as $key => $attributeVariation) {
                if ($key != 0) {
                    $arr[] = $attributeVariation->keys()->all();
                }
            }
            $collect = $collect->crossJoin(...$arr);
            $response = '';
            foreach ($collect as $item) {
                $response .= view('admin.product.components.box_item_variation', [
                    'attributeVariations' => $attributeVariations,
                    'selected' => $item
                ])->render();
            }
            return $response;
        } else {
            $response = view('admin.product.components.no-variation');
        }
        return $response;
    }

}