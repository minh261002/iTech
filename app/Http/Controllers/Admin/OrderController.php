<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use App\Repositories\Interfaces\Product\ProductRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $productRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function index(): View
    {
        return view('admin.order.index');
    }

    public function create(): View
    {
        $users = User::all();
        $provinces = Province::all();

        return view('admin.order.create', compact('users', 'provinces'));
    }

    public function getUserInfo(Request $request): JsonResponse
    {
        $user = User::find($request->user_id);
        return response()->json($user);
    }

    public function getProductInfo(Request $request)
    {
        // $products = Product::where('status', 2)->paginate(1);
        // if ($request->has('search')) {
        //     $products = Product::where(['name', 'like', '%' . request()->search . '%'])
        //         ->where('status', 2)
        //         ->paginate(1);

        //     return view('admin.order.components.box_product', compact('products'))->render();
        // }

        // return view('admin.order.components.modal', compact('products'))->render();

        $offset = request()->get('offset', 0);
        $limit = 10;

        $products = Product::where('status', 2)
            ->with('productVariation')
            ->with('productVariation.attributeVariations')
            ->get();
        $productsArray = $products->toArray();

        if (request()->has('search')) {
            $search = request()->get('search');
            $productsArray = array_filter($productsArray, function ($product) use ($search) {
                return strpos($product['name'], $search) !== false;
            });
        }

        $total = count($productsArray);

        $productsArray = array_slice($productsArray, $offset, $limit);

        if($request->has('search')) {
            return view('admin.order.components.box_product', [
                'products' => $productsArray,
                'total' => $total
            ])->render();
        }

        return view('admin.order.components.modal', [
            'products' => $productsArray,
            'total' => $total
        ])->render();
    }
}