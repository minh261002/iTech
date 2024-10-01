<?php

namespace App\Repositories\Interfaces;


interface ProductAttributeRepositoryInterface extends EloquentRepositoryInterface
{
    public function createOrUpdateWithVariation($product_id, array $productAttribute);

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
}