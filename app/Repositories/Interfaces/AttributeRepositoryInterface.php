<?php

namespace App\Repositories\Interfaces;

interface AttributeRepositoryInterface extends EloquentRepositoryInterface
{
    public function findOrFailWithVariations($id);

    public function getAllPluckById($column = 'name');

    public function findOrFailWithRelations($id, $relations = ['variations']);

    public function getQueryBuilderWithRelations(array $relations = ['variations']);

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
}