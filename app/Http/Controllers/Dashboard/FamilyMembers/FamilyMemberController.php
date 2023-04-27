<?php

namespace App\Http\Controllers\Dashboard\FamilyMembers;

use App\Http\Controllers\Controller;
use App\Models\FamilyMember;
use Illuminate\Http\Request;

class FamilyMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = FamilyMember::all();
        return view('dashboard.familyMembers.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.familyMembers.addMember');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $member = FamilyMember::create([
            'name' => $request->name,
            'information' => $request->information
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $member->addMediaFromRequest('image')->toMediaCollection('member_image');
        }

        return redirect()->route('members.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FamilyMember  $familyMember
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $familyMember = FamilyMember::find($id);
        return view('dashboard.familyMembers.memberDetails', compact('familyMember'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FamilyMember  $familyMember
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $familyMember = FamilyMember::find($id);
        return view('dashboard.familyMembers.editMember', compact('familyMember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FamilyMember  $familyMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = FamilyMember::find($id);
        $keys = ['name', 'information'];

        foreach ($keys as $key) {
            if ($request->hasAny($key)) {
                $member->update([
                    $key => $request->$key
                ]);
            }
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $member->clearMediaCollection('member_image');
            $member->addMediaFromRequest('image')->toMediaCollection('member_image');
        }

        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FamilyMember  $familyMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(FamilyMember $familyMember)
    {
        //
    }

    public function memberActivation($id)
    {
        $member = FamilyMember::where('id', $id)->first();
        $activemember = $member->is_active;
        if ($activemember == '1') {
            $member->update(['is_active' => '0']);
        } else {
            $member->update(['is_active' => '1']);
        }

        return back();
    }

    public function deleteMember(Request $request)
    {
        FamilyMember::where('id', $request->member_id)->delete();
        return back();
    }
}
