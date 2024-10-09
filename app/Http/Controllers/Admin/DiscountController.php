<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscountStoreRequest;
use App\Http\Requests\Admin\DiscountUpdateRequest;
use App\Models\User;
use App\Repositories\Interfaces\DiscountRepositoryInterface;
use App\Repositories\Interfaces\Product\ProductRepositoryInterface;
use App\Services\Interfaces\DiscountServiceInterface;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    protected $discountService;
    protected $discountRepository;
    protected $productRepository;
    protected $productVariationRepository;

    public function __construct(
        DiscountServiceInterface $discountService,
        DiscountRepositoryInterface $discountRepository,
        ProductRepositoryInterface $productRepository,
    ) {
        $this->discountService = $discountService;
        $this->discountRepository = $discountRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $discounts = $this->discountRepository->getAll();
        return view('admin.discount.index', compact('discounts'));
    }

    public function create()
    {
        $users = User::all();
        $products = $this->productRepository->getAll();

        return view('admin.discount.create', compact('users', 'products'));
    }

    public function store(DiscountStoreRequest $request)
    {
        $this->discountService->create($request);

        notyf()->success('Thêm mã giảm giá thành công');
        return redirect()->route('admin.discount.index');
    }

    public function edit($id)
    {
        $discount = $this->discountRepository->find($id);
        $users = User::all();
        $products = $this->productRepository->getAll();

        return view('admin.discount.edit', compact('discount', 'users', 'products'));
    }

    public function update(DiscountUpdateRequest $request)
    {
        $this->discountService->update($request);

        notyf()->success('Cập nhật thành công');
        return redirect()->back();
    }

    public function updateStatus(Request $request)
    {
        $this->discountService->updateStatus($request);
        return response()->json(['status' => 'success']);
    }

    public function delete($id)
    {
        $this->discountService->delete($id);

        notyf()->success('Xóa mã giảm giá thành công');
        return response()->json(['status' => 'success']);
    }
}