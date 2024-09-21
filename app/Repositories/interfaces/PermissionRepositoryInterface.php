<?php

namespace App\Repositories\Interfaces;

use App\Repositories\Interfaces\EloquentRepositoryInterface;

interface PermissionRepositoryInterface extends EloquentRepositoryInterface
{
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
	public function getAllModules();
}