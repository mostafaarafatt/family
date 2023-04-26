<?php

namespace App\Http\Controllers\Dashboard\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDashboardRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserDashboardController extends Controller
{

    public function __construct()
    {
        // عشان لو حد ليه صلاحيه معينه وميدرش يعملها ... ولو أخدت اللينك بتاعها وفتحته فى مكان تانى ميفتحش معايا
        $this->middleware(['permission:users-read'])->only('index');
        $this->middleware(['permission:users-create'])->only('create');
        $this->middleware(['permission:users-update'])->only('show');
        $this->middleware(['permission:users-delete'])->only('deleteUser');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('is_checked', '1')->get();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserDashboardRequest $request)
    {
        // dd($request->all());
        $request_data = $request->except('password_confirmation', 'image');
        $request_data['password'] = bcrypt($request->password);
        $user = User::create($request_data);
        $user->update(['is_checked' => '1']);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $user->addMediaFromRequest('image')->toMediaCollection('user_image');
        }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        // dd($user);
        return view('dashboard.users.editUser', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserDashboardRequest $request, $id)
    {
        // dd($request->all());
        $user = User::find($id);
        $keys = ['name', 'email', 'phone', 'user_type',];

        foreach ($keys as $key) {
            if ($request->hasAny($key)) {
                $user->update([
                    $key => $request->$key
                ]);
            }
        }

        if ($request->user_type == "normal") {
            $user->update([
                'influent_name' => null,
                'influent_phone' => null,
                'influent_email' => null
            ]);
        } else {
            $user->update([
                'influent_name' => $request->influent_name,
                'influent_phone' => $request->influent_phone,
                'influent_email' => $request->influent_email
            ]);
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $user->clearMediaCollection('user_image');
            $user->addMediaFromRequest('image')->toMediaCollection('user_image');
        }

        return redirect()->route('users.index');
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

    public function deleteUser(Request $request)
    {
        User::where('id', $request->user_id)->delete();
        return back();
    }

    public function userActivation($id)
    {
        $user = User::where('id', $id)->first();
        $activeUser = $user->is_active;
        if ($activeUser == '1') {
            $user->update(['is_active' => '0']);
        } else {
            $user->update(['is_active' => '1']);
        }

        return back();
    }
}
