<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;

class LocationController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $get = $request->input();

        $html = '';
        if ($get['target'] == 'districts') {
            $province = Province::with('districts')->where('code', $get['data']['location_id'])->first();
            $html = $this->renderHtml($province->districts);
        } else if ($get['target'] == 'wards') {
            $district = District::with('wards')->where('code', $get['data']['location_id'])->first();
            $html = $this->renderHtml($district->wards, '[Chọn Phường / Xã]');
        }
        $response = [
            'html' => $html
        ];
        return response()->json($response);
    }

    public function renderHtml($districts, $root = '[Chọn Quận / Huyện]')
    {
        $html = '<option value="0">' . $root . '</option>';
        foreach ($districts as $district) {
            $html .= '<option value="' . $district->code . '">' . $district->name . '</option>';
        }
        return $html;
    }
}