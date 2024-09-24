<?php

namespace App\Repositories;
use App\Models\Slider;
use App\Repositories\Interfaces\SliderRepositoryInterface;

class SliderRepository extends EloquentRepository implements SliderRepositoryInterface{
    protected $select = [];

    public function getModel(){
        return Slider::class;
    }

    public function getQueryBuilderWithRelations(array $relations = ['items']){
        $this->getQueryBuilderOrderBy();
        $this->instance = $this->instance->with($relations);
        return $this->instance;
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}