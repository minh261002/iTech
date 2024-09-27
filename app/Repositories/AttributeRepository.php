<?php

namespace App\Repositories;
use App\Models\Attribute;
use App\Repositories\Interfaces\AttributeRepositoryInterface;

class AttributeRepository extends EloquentRepository implements AttributeRepositoryInterface
{
    public function getModel()
    {
        return Attribute::class;
    }
}