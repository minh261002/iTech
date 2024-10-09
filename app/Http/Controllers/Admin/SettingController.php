<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function general(): View
    {
        $general = Setting::where('group', 1)->pluck('value', 'key')->toArray();
        return view('admin.setting.general', compact('general'));
    }

    public function updateGeneral(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value, 'group' => 1]);
        }


        notyf()->success('Cập nhật thành công');
        return redirect()->back();
    }

    public function seo(): View
    {
        $seo = Setting::where('group', 2)->pluck('value', 'key')->toArray();
        return view('admin.setting.seo', compact('seo'));
    }

    public function updateSeo(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value, 'group' => 2]);
        }

        notyf()->success('Cập nhật thành công');
        return redirect()->back();
    }
}