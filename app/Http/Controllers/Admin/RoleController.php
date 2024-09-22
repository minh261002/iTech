<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleStoreRequest;
use App\Http\Requests\Admin\RoleUpdateRequest;
use App\Models\Module;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Services\Interfaces\RoleServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Models\Role;

class RoleController extends Controller
{
    protected $roleRepository;
    protected $roleService;

    public function __construct(
        RoleRepositoryInterface $roleRepository,
        RoleServiceInterface $roleService
    ) {
        $this->roleRepository = $roleRepository;
        $this->roleService = $roleService;
    }
    public function index(): View
    {
        $roles = $this->roleRepository->getAll();
        return view('admin.role.index', compact('roles'));
    }

    public function create(): View
    {
        $modules = $this->roleRepository->getAllModules();
        return view('admin.role.create', compact('modules'));
    }

    public function store(RoleStoreRequest $request): RedirectResponse
    {
        $this->roleService->store($request);
        notyf()->success('Thêm mới thành công');
        return redirect()->route('admin.role.index');
    }

    public function edit(int $id): View
    {
        $role = $this->roleRepository->findOrFail($id);
        $modules = $this->roleRepository->getAllModules();
        return view('admin.role.edit', compact('role', 'modules'));
    }

    public function update(RoleUpdateRequest $request): RedirectResponse
    {
        $this->roleService->update($request);
        notyf()->success('Cập nhật thành công');
        return redirect()->back();
    }

    public function delete(int $id): JsonResponse
    {
        $this->roleService->delete($id);

        notyf()->success('Xóa thành công');
        return response()->json(['status' => 'success']);
    }
}
