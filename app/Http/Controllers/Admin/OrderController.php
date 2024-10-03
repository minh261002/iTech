<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('admin.order.index');
    }

    public function create(): View
    {
        $users = User::all();
        $provinces = Province::all();
        $products = Product::all();
        return view('admin.order.create', compact('users', 'provinces', 'products'));
    }

    public function getUserInfo(Request $request): JsonResponse
    {
        $user = User::find($request->user_id);
        return response()->json($user);
    }
}