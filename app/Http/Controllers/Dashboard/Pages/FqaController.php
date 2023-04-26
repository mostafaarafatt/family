<?php

namespace App\Http\Controllers\Dashboard\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\FqaRequest;
use App\Models\Fqa;
use Illuminate\Http\Request;

class FqaController extends Controller
{
    public function __construct()
    {
        // عشان لو حد ليه صلاحيه معينه وميدرش يعملها ... ولو أخدت اللينك بتاعها وفتحته فى مكان تانى ميفتحش معايا
        $this->middleware(['permission:pages-read'])->only('index');
        $this->middleware(['permission:pages-create'])->only('addpage');
        $this->middleware(['permission:pages-update'])->only('editpage');
        // $this->middleware(['permission:pages-delete'])->only('destroy');
    }
    
    public function index()
    {
        $fqas = Fqa::all();
        return view('dashboard.fqapage.fqaindex',compact('fqas'));
    }

    public function create()
    {   

        return view('dashboard.fqapage.addfaq');
    }

    public function store(FqaRequest $request)
    {
        // return $request;
        Fqa::create([
            'question'=>$request->question,
            'answer'=>$request->answer,
        ]);
        return redirect('fqapage');
    }

    public function show(Fqa $fqa)
    {
       //
    }

    public function edit($id)
    {
        $fqa = Fqa::find($id);
        return view('dashboard.fqapage.editfaq',compact('fqa'));
    }

    public function update(FqaRequest $request, $id)
    {
        $request_new = $request->except(['_method','_token']);
        Fqa::where('id',$id)->update($request_new);
        return redirect('fqapage');
    }

    // public function destroy($id)
    // {
    //     Fqa::find($id)->delete();
    //     return back();
    // }

    public function deleteFqa(Request $request)
    {
        Fqa::find($request->fqa_id)->delete();
        return back();
    }
}
