<?php

namespace App\Http\Controllers\Dashboard\Members;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Http\Requests\MemberUpdateInfoRequest;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function __construct()
    {
        // عشان لو حد ليه صلاحيه معينه وميدرش يعملها ... ولو أخدت اللينك بتاعها وفتحته فى مكان تانى ميفتحش معايا
        $this->middleware(['permission:admins-read'])->only('index');
        $this->middleware(['permission:admins-create'])->only('create');
        $this->middleware(['permission:admins-update'])->only('edit');
        $this->middleware(['permission:admins-delete'])->only('deleteMember');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Admin::all();
        return view('dashboard.members.index', compact('members'));
    }

    
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.members.addMember', compact('roles'));
    }

    
    public function store(MemberRequest $request)
    {
        $request_data = $request->except(['member_type', 'password_confirmation']);
        $request_data['password'] = bcrypt($request->password);

        $admin = Admin::create($request_data);

        $role_name = Role::find($request->member_type)->name;
        $admin->attachRole($role_name);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $admin->addMediaFromRequest('image')->toMediaCollection('admin_image');
        }

        return redirect()->route('members.index');
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

        return view('dashboard.members.editMember', compact('admin', 'roles', 'role_name', 'role_id'));
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

        if ($request->member_type) {
            $role_name = Role::find($request->member_type)->name;
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
                return redirect()->route('members.index');
            } else {
                return redirect()->back()->with('check_password', 'wrong password');
            }
        }

        $admin->clearMediaCollection('admin_image');
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $admin->addMediaFromRequest('image')->toMediaCollection('admin_image');
        }

        return redirect()->route('members.index');
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

    public function deleteMember(Request $request)
    {
        $admin = Admin::where('id', $request->member_id)->first();
        $admin->detachRole($admin->id);
        $admin->delete();
        return back();
    }

    public function memberActivation($id)
    {
        $member = Admin::find($id);
        $activeMember = $member->is_active;
        if ($activeMember == '1') {
            $member->update(['is_active' => '0']);
        } else {
            $member->update(['is_active' => '1']);
        }

        return back();
    }
}
