<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ModuleStoreRequest;
use App\Http\Requests\Admin\ModuleUpdateRequest;
use App\Models\Module;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModuleController extends Controller
{
    public function index(): View
    {
        $modules = Module::all();
        return view('admin.module.index', compact('modules'));
    }

    public function create(): View
    {
        return view('admin.module.create');
    }

    public function store(ModuleStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Module::create($data);

        notyf()->success('Thêm module thành công');
        return redirect()->route('admin.module.index');
    }

    public function edit(int $id){
        $module = Module::findOrFail($id);
        $permissions = $module->permissions;
        return view('admin.module.edit', compact('module', 'permissions'));
    }

    public function update(ModuleUpdateRequest $request, int $id): RedirectResponse
    {
        $module = Module::findOrFail($id);
        $data = $request->validated();

        $module->update($data);

        notyf()->success('Cập nhật module thành công');
        return redirect()->route('admin.module.index');
    }

    public function delete(int $id): JsonResponse
    {
        Module::destroy($id);

        notyf()->success('Xóa module thành công');
        return response()->json(['status' => 'success']);
    }
}