<?php
namespace App\Repositories;

use App\Models\Module;
use App\Models\Permission;
use App\Repositories\Interfaces\PermissionRepositoryInterface;


class PermissionRepository extends EloquentRepository implements PermissionRepositoryInterface
{

    protected $select = [];

    public function getModel()
    {
        return Permission::class;
    }


    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }

    public function getAllModules()
    {
        return Module::orderBy('id', 'DESC')->get();
    }
}