<?php

namespace App\Repositories\Product;
use App\Models\ProductVariation;
use App\Repositories\EloquentRepository;
use App\Repositories\Interfaces\Product\ProductVariationRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductVariationRepository extends EloquentRepository implements ProductVariationRepositoryInterface
{
    protected $select = [];

    public function getModel()
    {
        return ProductVariation::class;
    }

    public function getByIdsAndOrderByIdsWithRelations(array $ids, array $relations = ['product'])
    {
        $this->instance = $this->model
            ->whereIn('id', $ids)
            ->with($relations)
            // ->orderByRaw(DB::raw("FIELD(id, " . implode(',', $ids) . ")"))
            ->orderByRaw("FIELD(id, " . implode(',', $ids) . ")")
            ->get();

        return $this->instance;
    }

    public function createOrUpdateWithVariation($product_id, array $productVariation)
    {
        $position = 0;
        $ids = [];

        foreach ($productVariation['attribute_variation_id'] as $key => $item) {
            $dataModel = $this->model->updateOrCreate([
                'id' => $productVariation['id'][$key],
                'product_id' => $product_id,
            ], [
                'price' => $productVariation['price'][$key],
                'sale_price' => $productVariation['sale_price'][$key],
                'image' => $productVariation['image'][$key],
                'position' => $position,
                'qty' => $productVariation['qty'][$key],
            ]);
            $dataModel->attributeVariations()->sync($item);
            $ids[] = $dataModel->id;
            $position++;
        }

        $this->deleteTrash($product_id, $ids);
        return true;
    }

    protected function deleteTrash($product_id, array $ids)
    {
        return $this->model->where('product_id', $product_id)->whereNotIn('id', $ids)->delete();
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