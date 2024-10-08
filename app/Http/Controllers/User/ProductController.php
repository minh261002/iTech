<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('user.pages.product.index');
    }

    public function product_detail()
    {
        return view('user.pages.product.product-detail');
    }

    public function cart_0()
    {
        return view('user.pages.user.cart_0');
    }
    public function cart()
    {
        return view('user.pages.user.cart');
    }
}
