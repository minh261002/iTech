<?php

namespace App\Repositories\Interfaces;

interface SliderRepositoryInterface extends EloquentRepositoryInterface
{
    public function getQueryBuilderWithRelations(array $relations = ['items']);

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
}