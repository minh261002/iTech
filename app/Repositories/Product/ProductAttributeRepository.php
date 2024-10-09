<?php

namespace App\Repositories\Product;
use App\Models\ProductAttribute;
use App\Repositories\EloquentRepository;
use App\Repositories\Interfaces\Product\ProductAttributeRepositoryInterface;

class ProductAttributeRepository extends EloquentRepository implements ProductAttributeRepositoryInterface
{
    protected $select = [];

    public function getModel()
    {
        return ProductAttribute::class;
    }
    public function createOrUpdateWithVariation($product_id, array $productAttribute)
    {
        foreach ($productAttribute['attribute_id'] as $key => $value) {
            $this->model->updateOrCreate([
                'product_id' => $product_id,
                'attribute_id' => $value,
            ], [
                'position' => $key
            ])->attributeVariations()
                ->sync($productAttribute['attribute_variation_id'][$value]);
        }
    }

    public function delete($id)
    {
        $this->findOrFail($id);
        if ($this->instance) {
            $this->instance->delete();
            return true;
        }
        return false;
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}
