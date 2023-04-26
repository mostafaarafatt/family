<?php

namespace App\Http\Controllers\Dashboard\Roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreValidationRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function __construct()
    {
        // عشان لو حد ليه صلاحيه معينه وميدرش يعملها ... ولو أخدت اللينك بتاعها وفتحته فى مكان تانى ميفتحش معايا
        $this->middleware(['permission:roles-read'])->only('index');
        $this->middleware(['permission:roles-create'])->only('create');
        $this->middleware(['permission:roles-update'])->only('edit');
        $this->middleware(['permission:roles-delete'])->only('deleteRole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::where('id', '!=', '1')->get();
        //return $roles;
        return view('dashboard.roles.roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.roles.addRole');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreValidationRequest $request)
    {
        if ($request->name == null) {
            return redirect()->back()->with('nameStatus', __('you should write the name of role'));
        }

        $get_permissions = $request->permissions;
        if ($get_permissions == null) {
            return redirect()->back()->with('permissionStatus', __('you should choose at least one permission'));
        }

        $role = Role::firstOrCreate([
            'name' => str_replace(' ', '_', $request->name),
            'display_name' => ucwords(str_replace('_', ' ', $request->name)),
            'description' => ucwords(str_replace('_', ' ', $request->name))
        ]);

        foreach ($get_permissions as $permission) {

            $words = explode(' ', trim($permission));

            $permissions[] = Permission::firstOrCreate([
                'name' => $words[0] . '-' . $words[1],
                'display_name' => ucfirst($words[1]) . ' ' . ucfirst($words[0]),
                'description' => ucfirst($words[1]) . ' ' . ucfirst($words[0]),
            ])->id;
        }
        // Attach all permissions to the role
        $role->permissions()->sync($permissions);

        return redirect()->route('roles.index');
    }


    public function show($id)
    {
    }



    public function edit($id)
    {
        // $permission = (array) null;
        $role = Role::find($id);
        $permissions = $role->permissions;

        return view('dashboard.roles.editRole', compact('permissions', 'role'));
    }



    public function update(Request $request, $id)
    {
        if ($request->name == null) {
            return redirect()->back()->with('nameStatus', __('you should write the name of role'));
        }

        $get_permissions = $request->permissions;
        if ($get_permissions == null) {
            return redirect()->back()->with('status', 'you should choose at least one permission');
        }

        Role::where('id', $id)->delete();

        $role = Role::firstOrCreate([
            'name' => str_replace(' ', '_', $request->name),
            'display_name' => ucwords(str_replace('_', ' ', $request->name)),
            'description' => ucwords(str_replace('_', ' ', $request->name))
        ]);



        foreach ($get_permissions as $permission) {

            $words = explode(' ', trim($permission));

            $permissions[] = Permission::firstOrCreate([
                'name' => $words[0] . '-' . $words[1],
                'display_name' => ucfirst($words[1]) . ' ' . ucfirst($words[0]),
                'description' => ucfirst($words[1]) . ' ' . ucfirst($words[0]),
            ])->id;
        }
        // Attach all permissions to the role
        $role->permissions()->sync($permissions);

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function deleteRole(Request $request)
    {
        Role::where('id', $request->role_id)->delete();
        return redirect()->route('roles.index');
    }
}
