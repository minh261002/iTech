<?php

namespace App\Repositories\Interfaces\Product;
use App\Repositories\Interfaces\EloquentRepositoryInterface;

interface ProductAttributeRepositoryInterface extends EloquentRepositoryInterface
{

    public function createOrUpdateWithVariation($product_id, array $productAttribute);

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');

}