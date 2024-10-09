<?php

namespace App\Repositories\Product;
use App\Models\Product;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\Product\ProductRepositoryInterface;

class ProductRepository extends EloquentRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    public function getByIdsAndOrderByIds(array $ids)
    {
        $this->instance = $this->model
            ->whereIn('id', $ids)
            // ->orderByRaw(DB::raw("FIELD(id, " . implode(',', $ids) . ")"))
            ->orderByRaw("FIELD(id, " . implode(',', $ids) . ")")
            ->get();

        return $this->instance;
    }

    public function getAllByColumns(array $data)
    {
        $this->getQueryBuilder();
        foreach ($data as $key => $value) {
            if ($key == 'name') {
                $this->instance = $this->instance->where($key, 'like', "%{$value}%");
            } else {
                $this->instance = $this->instance->where($key, $value);
            }
        }
        $this->instance = $this->instance->get();
        return $this->instance;
    }
    public function getByColumnsWithRelationsLimit(array $data, array $relations = ['productVariations.attributeVariations.attribute'], $limit = 10)
    {
        $this->getQueryBuilderWithRelations($relations);

        foreach ($data as $key => $value) {
            if ($key == 'name') {
                $this->instance = $this->instance->where($key, 'like', "%{$value}%");
            } else {
                $this->instance = $this->instance->where($key, $value);
            }
        }

        $this->instance = $this->instance->limit($limit)->get();
        return $this->instance;
    }

    public function attachCategories(Product $product, array $categoriesId)
    {
        return $product->categories()->attach($categoriesId);
    }

    public function syncCategories(Product $product, array $categoriesId)
    {
        return $product->categories()->sync($categoriesId);
    }
    public function deleteProductAttributes(Product $product)
    {
        $product->productAttributes()->delete();
    }
    public function deleteProductVariations(Product $product)
    {
        $product->productVariations()->delete();
    }
    public function loadRelations(Product $product, array $relations = [])
    {
        return $product->load($relations);
    }
    public function getQueryBuilderWithRelations($relations = ['categories', 'productVariations'])
    {
        $this->getQueryBuilderOrderBy();
        $this->instance = $this->instance->with($relations);
        return $this->instance;
    }
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}
