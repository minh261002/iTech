<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleStoreRequest;
use App\Http\Requests\Admin\RoleUpdateRequest;
use App\Models\Module;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(): View
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    public function create(): View
    {
        $modules = Module::all();
        return view('admin.role.create', compact('modules'));
    }

    public function store(RoleStoreRequest $request): RedirectResponse
    {
        $role = Role::create($request->only('title', 'name', 'guard_name'));
        $role->permissions()->attach($request->permissions);

        notyf()->success('Thêm mới thành công');
        return redirect()->route('admin.role.index');
    }

    public function edit(int $id): View
    {
        $role = Role::find($id);
        $modules = Module::all();
        return view('admin.role.edit', compact('role', 'modules'));
    }

    public function update(RoleUpdateRequest $request): RedirectResponse
    {
        $role = Role::find($request->id);
        $role->update($request->only('title', 'name', 'guard_name'));

        $role->permissions()->sync($request->permissions);

        notyf()->success('Cập nhật thành công');
        return redirect()->back();
    }

    public function delete(int $id): JsonResponse
    {
        $role = Role::findOrFail($id);
        $role->permissions()->detach();

        $role->delete();

        notyf()->success('Xóa thành công');
        return response()->json(['status' => 'success']);
    }
}