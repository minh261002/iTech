<?php

namespace App\Repositories;
use App\Models\Module;
use App\Models\Permission;
use App\Repositories\Interfaces\ModuleRepositoryInterface;

class ModuleRepository extends EloquentRepository implements ModuleRepositoryInterface
{
    protected $select = [];

    public function getModel()
    {
        return Module::class;
    }


    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }

    public function getAllPermissions()
    {
        return Permission::all();
    }

    public function getAllPermissionsOfTheModule($moduleID)
    {
        return Permission::where('module_id', $moduleID)->get();
    }

    public function getAllModulesWithPermissions()
    {
        $modules = Module::all();
        $modulesWithPermissions = array();
        foreach ($modules as $module) {

            $permissions = $this->getAllPermissionsOfTheModule($module->id);

            $modulesWithPermissions[$module->id] =
                [
                    'name' => $module->name,
                    'description' => $module->description,
                    'status' => $module->status,
                    'permissions' => $permissions,
                ]
            ;

        }
        return $modulesWithPermissions;
    }

}