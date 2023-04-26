<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;
use App\Models\AirFlight;
use App\Models\Hotel;
use App\Models\Report;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function index()
    {
        $countOfUsersThatUsedApp = count(User::all());
        $countOfReportsUsedInApp = count(Report::all());

        return view('dashboard.layouts.layout', compact('countOfUsersThatUsedApp', 'countOfReportsUsedInApp'));
    }

    public function login()
    {
        return view('dashboard.auth.adminLogin');
    }

    public function adminLogin(AdminLoginRequest $request)
    {

        $credentials = $request->only('email', 'password');
        $admin = Admin::where('email', $request->email)->first();
        // dd($admin->is_active);
        if ($admin->is_active != '0') {
            if (Auth::guard('admin')->attempt($credentials)) {
                // Session::put('setting', $setting->getFirstMediaUrl('Logo'));
                return redirect()->intended('index')
                    ->withSuccess('Signed in');
            }
        }


        return redirect("admin/login")->with('status', __('You are currently inactive'));
    }

    public function signOut()
    {
        Auth::logout();
        return Redirect('admin/login');
    }
}
