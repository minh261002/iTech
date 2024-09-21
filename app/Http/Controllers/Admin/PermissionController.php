<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionStoreRequest;
use App\Http\Requests\Admin\PermissionUpdateRequest;
use App\Models\Module;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Services\Interfaces\PermissionServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Models\Permission;

class PermissionController extends Controller
{
    protected $permissionRepository;
    protected $permissionService;

    public function __construct(
        PermissionRepositoryInterface $permissionRepository,
        PermissionServiceInterface $permissionService
    ) {
        $this->permissionRepository = $permissionRepository;
        $this->permissionService = $permissionService;
    }

    public function index(): View
    {
        $permissions = $this->permissionRepository->getAll();
        return view('admin.permission.index', compact('permissions'));
    }

    public function create(): View
    {
        $modules = $this->permissionRepository->getAllModules();
        return view('admin.permission.create', compact('modules'));
    }

    public function store(PermissionStoreRequest $request): RedirectResponse
    {
        $this->permissionService->store($request);

        notyf()->success('Thêm quyền thành công');
        return redirect()->route('admin.permission.index');
    }

    public function edit(int $id): View
    {
        $permission = $this->permissionRepository->findOrFail($id);
        $modules = $this->permissionRepository->getAllModules();
        return view('admin.permission.edit', compact('permission', 'modules'));
    }

    public function update(PermissionUpdateRequest $request): RedirectResponse
    {
        $this->permissionService->update($request);
        notyf()->success('Cập nhật quyền thành công');
        return redirect()->back();
    }

    public function delete(int $id): JsonResponse
    {
        $this->permissionService->delete($id);

        notyf()->success('Xóa quyền thành công');
        return response()->json(['status' => 'success']);
    }
}