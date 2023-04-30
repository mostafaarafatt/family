<?php

namespace App\Http\Controllers\Dashboard\Alpums;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Alpum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AlpumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alpums = Alpum::all();
        return view('dashboard.alupms.index', compact('alpums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.alupms.addAlpum');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin_id = Auth::guard('admin')->id();
        $admin = Admin::find($admin_id);

        $alpum = $admin->alpums()->create([
            'title' => $request->title
        ]);

        if ($request->hasFile('coverImage') && $request->file('coverImage')->isValid()) {
            $alpum->addMediaFromRequest('coverImage')->toMediaCollection('alpum_cover_image');
        }

        if ($images = $request->file('images')) {
            foreach ($images as $image) {
                $alpum->addMedia($image)->toMediaCollection('alpum_image');
            }
        }

        return redirect()->route('alpums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alpum  $alpum
     * @return \Illuminate\Http\Response
     */
    public function show(Alpum $alpum)
    {
        return view('dashboard.alupms.AlpumDetails', compact('alpum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alpum  $alpum
     * @return \Illuminate\Http\Response
     */
    public function edit(Alpum $alpum)
    {
        return view('dashboard.alupms.editAlpum', compact('alpum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alpum  $alpum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alpum $alpum)
    {
        $alpum->update([
            'title' => $request->title
        ]);

        if ($request->hasFile('coverImage') && $request->file('coverImage')->isValid()) {
            $alpum->clearMediaCollection('alpum_cover_image');
            $alpum->addMediaFromRequest('coverImage')->toMediaCollection('alpum_cover_image');
        }

        if ($images = $request->file('images')) {
            foreach ($images as $image) {
                $alpum->addMedia($image)->toMediaCollection('alpum_image');
            }
        }

        return redirect()->route('alpums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alpum  $alpum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alpum $alpum)
    {
        //
    }

    public function alpumActivation($id)
    {
        $alpum = Alpum::where('id', $id)->first();
        $activeAlpum = $alpum->is_active;
        if ($activeAlpum == '1') {
            $alpum->update(['is_active' => '0']);
        } else {
            $alpum->update(['is_active' => '1']);
        }

        return back();
    }

    public function deleteAlpum(Request $request)
    {
        $alpum = Alpum::where('id', $request->alpum_id)->first();

        $alpum->clearMediaCollection('alpum_image');
        $alpum->clearMediaCollection('alpum_cover_image');

        $alpum->delete();

        return back();
    }


    public function deleteImage(Request $request)
    {
        Media::find($request->image_id)->delete();
        return back();
    }
}
