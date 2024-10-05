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
        try {
            $categories = $this->data['category_id'];
            unset($this->data['category_id']);

            if (isset($this->data['gallery'])) {
                $this->data['gallery'] = json_encode($this->data['gallery']);
            }
            isset($this->data['product']['gallery']) && $this->data['product']['gallery'] = $this->data['gallery'];
            $product = $this->repository->create($this->data['product']);
            $product->categories()->sync($categories);

            if ($product->type == 2 && isset($this->data['product_attribute']) && $this->data['product_attribute']) {
                $this->repositoryProductAttribute->createOrUpdateWithVariation($product->id, $this->data['product_attribute']);

                $this->storeOrUpdateProductVariations($product->id);
            }

            DB::commit();
            return $product;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $this->data = $request->validated();
        try {
            $productId = $this->data['product']['id'];
            $categories = $this->data['category_id'];
            unset($this->data['category_id']);

            if (isset($this->data['gallery'])) {
                $this->data['gallery'] = json_encode($this->data['gallery']);
            }

            isset($this->data['gallery']) && $this->data['product']['gallery'] = $this->data['gallery'];
            $product = $this->repository->update($productId, $this->data['product']);
            $product->categories()->sync($categories);

            if ($product->type == 2 && isset($this->data['product_attribute']) && $this->data['product_attribute']) {
                $this->repositoryProductAttribute->createOrUpdateWithVariation($product->id, $this->data['product_attribute']);
                $this->storeOrUpdateProductVariations($product->id);
                $this->repository->update($productId, [
                    'price' => null,
                    'sale_price' => null,
                    'qty' => null
                ]);
            } else {
                $this->repository->deleteProductAttributes($product);
                $this->repository->deleteProductVariations($product);
            }

            DB::commit();
            return $product;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateStatus($request)
    {
        $this->data = $request->all();
        $productId = $this->data['product_id'];
        unset($this->data['product_id']);

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

        if ($data['variation_action'] == 1) {

            $response = view(
                'admin.product.components.box_item_variation',
                [
                    'attributeVariations' => $attributeVariations,
                    'identity' => $this->uniqidReal(5)
                ]
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
                    'selected' => $item,
                    'identity' => $this->uniqidReal(5)
                ])->render();
            }
            return $response;
        } else {
            $response = view('admin.product.components.no-variation');
        }
        return $response;
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}