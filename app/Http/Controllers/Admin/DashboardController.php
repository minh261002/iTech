<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class DashboardController extends Controller
{

    public function index(): View
    {
        return view('admin.dashboard.index');
    }

    public function updateFcmToken(Request $request)
    {
        $admin = auth()->guard('admin')->user();

        $admin->fcm_token = $request->fcm_token;
        $admin->save();

        return response()->json(['message' => 'success']);
    }
}