<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AttributeStoreRequest;
use App\Http\Requests\Admin\AttributeUpdateRequest;
use App\Http\Requests\Admin\AttributeVariationStoreRequest;
use App\Http\Requests\Admin\AttributeVariationUpdateRequest;
use App\Repositories\Interfaces\AttributeRepositoryInterface;
use App\Repositories\Interfaces\AttributeVariationRepositoryInterface;
use App\Services\Interfaces\AttributeServiceInterface;
use App\Services\Interfaces\AttributeVariationServiceInterface;
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
        AttributeVariationServiceInterface $attributeVariationService
    ) {
        $this->attributeRepository = $attributeRepository;
        $this->attributeService = $attributeService;
        $this->attributeVariationRepository = $attributeVariationRepository;
        $this->attributeVariationService = $attributeVariationService;
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

    public function variation($attrId): view
    {
        $variations = $this->attributeVariationRepository->getQueryBuilderByColumns('attribute_id', $attrId)->get();
        return view('admin.attribute.variation.index', compact('variations'));
    }

    public function createVariation($attrId): view
    {
        return view('admin.attribute.variation.create', compact('attrId'));
    }

    public function storeVariation(AttributeVariationStoreRequest $request)
    {
        $this->attributeVariationService->store($request);

        notyf()->success('Thêm biến thể thành công');
        return redirect()->route('admin.attribute.variation.index', $request->attribute_id);
    }

    public function editVariation($id): view
    {
        $variation = $this->attributeVariationRepository->findOrFail($id);
        return view('admin.attribute.variation.edit', compact('variation'));
    }

    public function updateVariation(AttributeVariationUpdateRequest $request)
    {
        $this->attributeVariationService->update($request);

        notyf()->success('Cập nhật biến thể thành công');
        return redirect()->back();
    }

    public function deleteVariation($id)
    {
        $this->attributeVariationService->delete($id);

        notyf()->success('Xóa biến thể thành công');
        return response()->json(['status' => 'success']);
    }
}