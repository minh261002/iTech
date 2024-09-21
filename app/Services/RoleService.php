<?php

namespace App\Services;

use App\Models\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Services\Interfaces\RoleServiceInterface;
use Illuminate\Http\Request;

class RoleService implements RoleServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;

    public function __construct(RoleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {

        $request->validated();
        $dataRole = $request->only('title', 'name', 'guard_name');

        $role = Role::create($dataRole);

        $roleId = $role->id;

        if ($request->has('permissions')) {
            $role->permissions()->attach($request->permissions);
        }

        return $roleId;
    }

    public function update(Request $request)
    {

        $this->data = $request->validated();
        $dataRole = $request->only('title', 'name', 'guard_name');
        $role = Role::findOrFail($this->data['id']);

        $role->permissions()->sync($this->data['permissions']);

        return $this->repository->update($this->data['id'], $dataRole);

    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $role->permissions()->detach();
        return $this->repository->delete($id);
    }

}