<?php

namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface extends EloquentRepositoryInterface
{
    public function getFlatTreeNotInNode(array $nodeId);

    public function getFlatTree();

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');

    public function search($search);
}
