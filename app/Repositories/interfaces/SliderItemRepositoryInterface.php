<?php

namespace App\Repositories\Interfaces;

interface SliderItemRepositoryInterface extends EloquentRepositoryInterface
{
    public function findOrFailWithRelations($id, $relations = ['slider']);
    public function getQueryBuilderByColumns($column, $value);
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
}