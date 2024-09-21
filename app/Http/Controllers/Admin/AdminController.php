<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminStoreRequest;
use App\Http\Requests\Admin\AdminUpdateRequest;
use App\Models\Admin;
use App\Models\Province;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $admins = Admin::all();
        return view('admin.admin.index', compact('admins'));
    }

    public function create(): View
    {
        $provinces = Province::all();
        $roles = Role::all();
        return view('admin.admin.create', compact('provinces', 'roles'));
    }

    public function store(AdminStoreRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);

        $admin = Admin::create($data);
        $admin->assignRole($data['role']);

        notyf()->success('Thêm mới thành công');
        return redirect()->route('admin.admin.index');
    }

    public function edit(int $id): View
    {
        $admin = Admin::findOrFail($id);
        $provinces = Province::all();
        $roles = Role::all();

        return view('admin.admin.edit', compact('admin', 'provinces', 'roles'));
    }

    public function update(AdminUpdateRequest $request, $id)
    {
        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $admin = Admin::findOrFail($id);
        $admin->update($data);
        $admin->syncRoles($data['role']);

        notyf()->success('Cập nhật thành công');
        return redirect()->back();
    }

    public function delete(int $id): JsonResponse
    {
        $admin = Admin::findOrFail($id);
        $admin->roles()->detach();
        $admin->delete();

        notyf()->success('Xóa thành công');
        return response()->json(['status' => 'success']);
    }

    public function ajaxAdmin(Request $request): JsonResponse
    {
        $keyword = $request->get('search');
        $adminId = $request->get('adminId');

        $admins = Admin::where('name', 'like', '%' . $keyword . '%')
            ->where('id', '!=', $adminId)
            ->get();

        return response()->json($admins);
    }
}