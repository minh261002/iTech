<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Services\Interfaces\CategoryServiceInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $categoryRepository;

    public function __construct(
        CategoryServiceInterface $categoryService,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getFlatTree();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getFlatTree();
        return view('admin.category.create', compact('categories'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $this->categoryService->store($request);

        notyf()->success('Thêm danh mục thành công');
        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->findOrFail($id);
        $categories = $this->categoryRepository->getFlatTree();
        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(CategoryUpdateRequest $request)
    {
        $this->categoryService->update($request);

        notyf()->success('Cập nhật danh mục thành công');
        return redirect()->back();
    }

    public function updateStatus(Request $request)
    {
        $this->categoryService->updateStatus($request);

        return response()->json(['status' => 'success']);
    }

    public function delete($id)
    {
        $this->categoryService->delete($id);

        notyf()->success('Xóa danh mục thành công');
        return response()->json(['status' => 'success']);
    }
}
