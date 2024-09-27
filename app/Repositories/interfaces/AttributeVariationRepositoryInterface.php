<?php

namespace App\Repositories\Interfaces;

interface AttributeVariationRepositoryInterface extends EloquentRepositoryInterface
{
    public function findOrFailWithRelations($id, $relations = ['attribute']);

    public function getQueryBuilderByColumns($column, $value);

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
}