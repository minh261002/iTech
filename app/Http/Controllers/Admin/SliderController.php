<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderItemStoreRequest;
use App\Http\Requests\Admin\SliderItemUpdateRequest;
use App\Http\Requests\Admin\SliderStoreRequest;
use App\Http\Requests\Admin\SliderUpdateRequest;
use App\Repositories\Interfaces\SliderItemRepositoryInterface;
use App\Repositories\Interfaces\SliderRepositoryInterface;
use App\Services\Interfaces\SliderItemServiceInterface;
use App\Services\Interfaces\SliderServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $sliderRepository;
    protected $sliderService;
    protected $sliderItemRepository;
    protected $sliderItemService;

    public function __construct(
        SliderRepositoryInterface $sliderRepository,
        SliderServiceInterface $sliderService,
        SliderItemRepositoryInterface $sliderItemRepository,
        SliderItemServiceInterface $sliderItemService
    ) {
        $this->sliderRepository = $sliderRepository;
        $this->sliderService = $sliderService;
        $this->sliderItemRepository = $sliderItemRepository;
        $this->sliderItemService = $sliderItemService;
    }

    public function index(): View
    {
        $sliders = $this->sliderRepository->getQueryBuilderWithRelations()->get();

        return view('admin.slider.index', compact('sliders'));
    }

    public function create(): View
    {
        return view('admin.slider.create');
    }

    public function store(SliderStoreRequest $request)
    {
        $this->sliderService->store($request);

        notyf()->success('Thêm slider thành công');
        return redirect()->route('admin.slider.index');
    }

    public function edit($id): View
    {
        $slider = $this->sliderRepository->findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderUpdateRequest $request)
    {
        $this->sliderService->update($request);

        notyf()->success('Cập nhật slider thành công');
        return redirect()->route('admin.slider.index');
    }

    public function updateStatus(Request $request)
    {
        $this->sliderService->updateStatus($request);

        return response()->json(['status' => 'success']);
    }

    public function delete($id)
    {
        $this->sliderService->delete($id);

        notyf()->success('Xóa slider thành công');
        return response()->json(['status' => 'success']);
    }

    public function indexItem($sliderId): View
    {
        $items = $this->sliderItemRepository->getQueryBuilderByColumns('slider_id', $sliderId)->get();
        return view('admin.slider.item.index', compact('items', 'sliderId'));
    }

    public function createItem($sliderId): View
    {
        return view('admin.slider.item.create', compact('sliderId'));
    }

    public function storeItem(SliderItemStoreRequest $request)
    {
        $this->sliderItemService->store($request);

        notyf()->success('Thêm item thành công');
        return redirect()->route('admin.slider.item.index', ['id' => $request->slider_id]);
    }

    public function editItem($id): View
    {
        $item = $this->sliderItemRepository->findOrFail($id);
        return view('admin.slider.item.edit', compact('item'));
    }

    public function updateItem(SliderItemUpdateRequest $request)
    {
        $this->sliderItemService->update($request);

        notyf()->success('Cập nhật item thành công');
        return redirect()->back();
    }

    public function deleteItem($id)
    {
        $this->sliderItemRepository->delete($id);

        notyf()->success('Xóa item thành công');
        return response()->json(['status' => 'success']);
    }
}