<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionStoreRequest;
use App\Http\Requests\Admin\PermissionUpdateRequest;
use App\Models\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index(): View
    {
        $permissions = Permission::all();
        return view('admin.permission.index', compact('permissions'));
    }

    public function create(): View
    {
        $modules = Module::orderBy('id', 'desc')->get();
        return view('admin.permission.create', compact('modules'));
    }

    public function store(PermissionStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Permission::create($data);

        notyf()->success('Thêm quyền thành công');
        return redirect()->route('admin.permission.index');
    }

    public function edit(int $id): View
    {
        $permission = Permission::findOrFail($id);
        $modules = Module::orderBy('id', 'desc')->get();
        return view('admin.permission.edit', compact('permission', 'modules'));
    }

    public function update(PermissionUpdateRequest $request, int $id): RedirectResponse
    {
        $data = $request->validated();

        $permission = Permission::findOrFail($id);
        $permission->update($data);

        notyf()->success('Cập nhật quyền thành công');
        return redirect()->back();
    }

    public function delete(int $id): RedirectResponse
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        notyf()->success('Xóa quyền thành công');
        return redirect()->back();
    }
}