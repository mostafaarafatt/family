<?php

namespace App\Http\Controllers;

use App\Http\Resources\SliderImage;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function __construct()
    {
        // عشان لو حد ليه صلاحيه معينه وميدرش يعملها ... ولو أخدت اللينك بتاعها وفتحته فى مكان تانى ميفتحش معايا
        $this->middleware(['permission:sliders-read'])->only('index');
        $this->middleware(['permission:sliders-create'])->only('addslider');
        $this->middleware(['permission:sliders-update'])->only('updateslider');
        // $this->middleware(['permission:sliders-delete'])->only('destroy');
    }
    public function index()
    {
        $sliders = Slider::get();
        return view('dashboard.sliders.sliders', compact('sliders'));
    }

    public function addslider()
    {
        return view('dashboard.sliders.addslider');
    }

    public function storeslider(Request $request)
    {
        // dd($request);
        $input = $request->all();
        $slider = Slider::create($input);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $slider->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return redirect()->route('sliders');
    }

    public function deleteslider(Request $request)
    {
        //dd($request);
        Slider::find($request->id_slider)->delete();
        return back();
    }

    public function updateslider($id)
    {
        $slider = Slider::where('id', $id)->first();
        return view('dashboard.sliders.editslider', compact('slider'));
    }

    public function updatesliderdone(Request $request, $id)
    {
        //dd($request);
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->save();

        if ($slider) {
            if ($request->hasFile('image')) {
                $slider->clearMediaCollection('image');
                $slider->addMediaFromRequest('image')->toMediaCollection('image');
            }
        }

        return redirect()->route('sliders');
    }

    //this method belongs to api route
    public function getSliderImages()
    {
        $sliders = Slider::all();
        return SliderImage::collection($sliders);
    }
    
}
