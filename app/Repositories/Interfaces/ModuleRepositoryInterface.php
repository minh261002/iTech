<?php

namespace App\Repositories\Interfaces;
interface ModuleRepositoryInterface extends EloquentRepositoryInterface
{
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
    public function getAllModulesWithPermissions();
    public function getAllPermissions();
	public function getAllPermissionsOfTheModule($moduleID);
}