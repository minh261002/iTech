<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ModuleStoreRequest;
use App\Http\Requests\Admin\ModuleUpdateRequest;
use App\Models\Module;
use App\Repositories\interfaces\ModuleRepositoryInterface;
use App\Services\Interfaces\ModuleServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ModuleController extends Controller
{

    protected $moduleRepository;
    protected $moduleService;

    public function __construct(ModuleRepositoryInterface $moduleRepository, ModuleServiceInterface $moduleService)
    {
        $this->moduleRepository = $moduleRepository;
        $this->moduleService = $moduleService;
    }

    public function index(): View
    {
        $modules = $this->moduleRepository->getAll();
        return view('admin.module.index', compact('modules'));
    }

    public function create(): View
    {
        return view('admin.module.create');
    }

    public function store(ModuleStoreRequest $request): RedirectResponse
    {
        $this->moduleService->store($request);

        notyf()->success('Thêm module thành công');
        return redirect()->route('admin.module.index');
    }

    public function edit(int $id)
    {
        $module = $this->moduleRepository->findOrFail($id);
        $permissions = $this->moduleRepository->getAllPermissionsOfTheModule($id);
        return view('admin.module.edit', compact('module', 'permissions'));
    }

    public function update(ModuleUpdateRequest $request): RedirectResponse
    {
        $this->moduleService->update($request);

        notyf()->success('Cập nhật module thành công');
        return redirect()->route('admin.module.index');
    }

    public function delete(int $id): JsonResponse
    {
        $this->moduleService->delete($id);

        notyf()->success('Xóa module thành công');
        return response()->json(['status' => 'success']);
    }
}