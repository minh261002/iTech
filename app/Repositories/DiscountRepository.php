<?php

namespace App\Repositories;
use App\Models\Discount;
use App\Repositories\Interfaces\DiscountRepositoryInterface;

class DiscountRepository extends EloquentRepository implements DiscountRepositoryInterface
{
    public function getModel()
    {
        return Discount::class;
    }
}