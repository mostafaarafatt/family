<?php

namespace App\Http\Controllers\Dashboard\AdminsDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Http\Requests\MemberUpdateInfoRequest;
use App\Mail\CreateNewAdmin;
use App\Mail\EmailDemo;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminDashController extends Controller
{
    public function __construct()
    {
        // عشان لو حد ليه صلاحيه معينه وميدرش يعملها ... ولو أخدت اللينك بتاعها وفتحته فى مكان تانى ميفتحش معايا
        $this->middleware(['permission:admins-read'])->only('index');
        $this->middleware(['permission:admins-create'])->only('create');
        $this->middleware(['permission:admins-update'])->only('edit');
        $this->middleware(['permission:admins-delete'])->only('deleteAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('dashboard.admins.index', compact('admins'));
    }

    
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.admins.addAdmin', compact('roles'));
    }

    
    public function store(MemberRequest $request)
    {
        $request_data = $request->except(['admin_type', 'password_confirmation']);
        $request_data['password'] = bcrypt($request->password);

        $admin = Admin::create($request_data);

        $role_name = Role::find($request->admin_type)->name;
        $admin->attachRole($role_name);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $admin->addMediaFromRequest('image')->toMediaCollection('admin_image');
        }

        Mail::to($request->email)->send(new CreateNewAdmin($request));

        return redirect()->route('admins.index');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $roles = Role::all();
        $admin = Admin::where('id', $id)->first();

        $admin_role = $admin->roles;
        $role_name = $admin_role[0]['name'];
        // dd($role_name);
        $role_id = $admin_role[0]['id'];
        // dd($admin_role);

        return view('dashboard.admins.editAdmin', compact('admin', 'roles', 'role_name', 'role_id'));
    }

   
    public function update(MemberUpdateInfoRequest $request, $id)
    {
        // dd($request->all());
        $admin = Admin::find($id);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
        ]);

        if ($request->admin_type) {
            $role_name = Role::find($request->admin_type)->name;
            $roles =  $admin->getRoles();
            $admin->detachRoles($roles);
            $admin->attachRole($role_name);
        }

        if ($request->current_password != null && $request->password != null && $request->password_confirmation != null) {
            $password = $admin->password;
            if (Hash::check($request->current_password, $password) && $request->password == $request->password_confirmation) {
                $password = Hash::make($request->password);
                $admin->update([
                    'password' => $password
                ]);
                return redirect()->route('admins.index');
            } else {
                return redirect()->back()->with('check_password', 'wrong password');
            }
        }

        $admin->clearMediaCollection('admin_image');
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $admin->addMediaFromRequest('image')->toMediaCollection('admin_image');
        }

        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }

    public function deleteAdmin(Request $request)
    {
        $admin = Admin::where('id', $request->admin_id)->first();
        $admin->detachRole($admin->id);
        $admin->delete();
        return back();
    }

    public function adminActivation($id)
    {
        $admin = Admin::find($id);
        $activeAdmin = $admin->is_active;
        if ($activeAdmin == '1') {
            $admin->update(['is_active' => '0']);
        } else {
            $admin->update(['is_active' => '1']);
        }

        return back();
    }
}
