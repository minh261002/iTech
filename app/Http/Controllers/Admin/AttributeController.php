<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AttributeStoreRequest;
use App\Http\Requests\Admin\AttributeUpdateRequest;
use App\Repositories\Interfaces\AttributeRepositoryInterface;
use App\Repositories\Interfaces\AttributeVariationRepositoryInterface;
use App\Services\Interfaces\AttributeServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    protected $attributeRepository;
    protected $attributeService;

    protected $attributeVariationRepository;
    protected $attributeVariationService;

    public function __construct(
        AttributeRepositoryInterface $attributeRepository,
        AttributeServiceInterface $attributeService,
        AttributeVariationRepositoryInterface $attributeVariationRepository,
    ) {
        $this->attributeRepository = $attributeRepository;
        $this->attributeService = $attributeService;
        $this->attributeVariationRepository = $attributeVariationRepository;
    }

    public function index(): View
    {
        $attributes = $this->attributeRepository->getAll();
        return view('admin.attribute.index', compact('attributes'));
    }

    public function create(): View
    {
        return view('admin.attribute.create');
    }

    public function store(AttributeStoreRequest $request)
    {
        $this->attributeService->store($request);

        notyf()->success('Thêm thuộc tính thành công');
        return redirect()->route('admin.attribute.index');
    }

    public function edit($id): View
    {
        $attribute = $this->attributeRepository->findOrFail($id);
        return view('admin.attribute.edit', compact('attribute'));
    }

    public function update(AttributeUpdateRequest $request)
    {
        $this->attributeService->update($request);

        notyf()->success('Cập nhật thuộc tính thành công');
        return redirect()->back();
    }

    public function delete($id)
    {
        $this->attributeService->delete($id);

        notyf()->success('Xóa thuộc tính thành công');
        return response()->json(['status' => 'success']);
    }

    public function variation(): view
    {
        $attributes = $this->attributeVariationRepository->findByField();
        return view('admin.attribute.variation', compact('attributes'));
    }
}
