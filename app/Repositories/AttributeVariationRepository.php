<?php

namespace App\Repositories;

use App\Models\AttributeVariation;
use App\Repositories\Interfaces\AttributeVariationRepositoryInterface;

class AttributeVariationRepository extends EloquentRepository implements AttributeVariationRepositoryInterface
{
    public function getModel()
    {
        return AttributeVariation::class;
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