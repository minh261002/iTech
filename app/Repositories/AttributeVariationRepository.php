<?php

namespace App\Repositories;

use App\Models\AttributeVariation;
use App\Repositories\Interfaces\AttributeVariationRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AttributeVariationRepository extends EloquentRepository implements AttributeVariationRepositoryInterface
{
    public function getModel()
    {
        return AttributeVariation::class;
    }

    public function getOrderByFollow(array $arrayId)
    {
        $array = [];
        $this->instance = $this->model;
        foreach ($arrayId as $ids) {
            // $qs = array_fill(0,count($ids),'?');
            $array[] = $this->instance->whereIn('id', $ids)
                ->orderByRaw(DB::raw("FIELD(id, " . implode(',', $ids) . ")"))
                // ->orderByRaw(DB::raw("FIELD(id,". implode(',', $qs).")"),$ids)
                ->pluck('name', 'id');
        }
        return $array;
    }

    public function findOrFailWithRelations($id, $relations = ['attribute'])
    {
        $this->findOrFail($id);
        $this->instance = $this->instance->load($relations);
        return $this->instance;
    }

    public function getQueryBuilderByColumns($column, $value)
    {
        $this->getQueryBuilderOrderBy('position', 'asc');
        $this->instance = $this->instance->where($column, $value);
        return $this->instance;
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}