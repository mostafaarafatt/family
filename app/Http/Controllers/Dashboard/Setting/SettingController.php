<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        // عشان لو حد ليه صلاحيه معينه وميدرش يعملها ... ولو أخدت اللينك بتاعها وفتحته فى مكان تانى ميفتحش معايا
        $this->middleware(['permission:settings-read'])->only(['publicSetting','socialSetting']);
        // $this->middleware(['permission:settings-create'])->only('addpage');
        $this->middleware(['permission:settings-update'])->only(['editPublicSetting','editSocialSetting']);
        // $this->middleware(['permission:settings-delete'])->only('destroy');
    }

    public function publicSetting()
    {
        $setting = Setting::first();
        return view('dashboard.settings.publicsetting', compact('setting'));
    }

    public function socialSetting()
    {
        $setting = Setting::first()->social_media;
        //    dd( $setting);

        return view('dashboard.settings.socialsetting', compact('setting'));
    }

    public function editPublicSetting(Request $request)
    {
        // dd($request->all());
        $setting = Setting::first();
        return view('dashboard.settings.editpublicsetting', compact('request', 'setting'));
    }

    public function editPublicSettingDone(Request $request)
    {

        $request->validate([
            'phone_number' => 'required|string|max:10|min:5',
            'app_rate' => 'required|string|max:10|min:1'
        ]);

        $setting = Setting::first();
        $setting->clearMediaCollection('Logo');
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $setting->addMediaFromRequest('image')->toMediaCollection('Logo');
        }

        $setting->update([
            'phone_number' => $request->phone_number,
            'app_rate' => $request->app_rate
        ]);

        return redirect()->route('publicSetting');
    }


    public function editSocialSetting(Request $request)
    {
        // dd($request->all());
        $setting = Setting::first();
        $setting->update([
            'social_media->Facebook' => $request->Facebook,
            'social_media->Instagram' => $request->Instagram,
            'social_media->Youtube' => $request->Youtube,
            'social_media->Snap Chat' => $request->Snap_Chat,
        ]);

        return redirect()->back();
    }
}
