<?php

namespace App\Repositories;
use App\Models\Slider;
use App\Repositories\Interfaces\SliderRepositoryInterface;

class SliderRepository extends EloquentRepository implements SliderRepositoryInterface{
    public function getModel()
    {
        return Slider::class;
    }
}