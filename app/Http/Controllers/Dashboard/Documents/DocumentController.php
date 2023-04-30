<?php

namespace App\Http\Controllers\Dashboard\Documents;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();
        return view('dashboard.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.documents.addDocument');
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
        $admin_id = Auth::guard('admin')->id();
        $admin = Admin::find($admin_id);

        $document = $admin->documents()->create([
            'title' => $request->title,
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $document->addMediaFromRequest('image')->toMediaCollection('document_image');
        }

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $document->addMediaFromRequest('file')->toMediaCollection('document_file');
        }

        return redirect()->route('documents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return view('dashboard.documents.documentDetails',compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }

    public function documentActivation($id)
    {
        $document = Document::where('id', $id)->first();
        $activeDocument = $document->is_active;
        if ($activeDocument == '1') {
            $document->update(['is_active' => '0']);
        } else {
            $document->update(['is_active' => '1']);
        }

        return back();
    }

    public function deleteDocument(Request $request)
    {
        Document::where('id', $request->document_id)->delete();
        return back();
    }
}
