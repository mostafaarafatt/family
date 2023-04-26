<?php

namespace App\Http\Controllers\Dashboard\Pages;

use App\Http\Controllers\Controller;
use App\Models\Fqa;
use App\Models\Page;
use App\Models\PageTranslation;
use Illuminate\Http\Request;

class PageController extends Controller
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
        $pages = Page::get();
        return view('dashboard.pages.staticpages', compact('pages'));
    }

    public function addpage()
    {
        return view('dashboard.pages.addpages');
    }

    public function addpagedone(Request $request)
    {
        $page = Page::create([
            'title_page' => $request->ar['title'],
            'en' => [
                'title' => $request->en['title'],
                'content' => $request->en['content'],
                'slug' => $request->en['slug']
            ],
            'ar' => [
                'title' => $request->ar['title'],
                'content' => $request->ar['content'],
                'slug' => $request->ar['slug']
            ]
        ]);

        return redirect()->route('staticpage');
    }

    public function editpage($id)
    {
        // return $id;
        $page = Page::where('id', $id)->first();
        $arPage =  $page->translations->where('locale', 'ar')[0];
        $enPage =  $page->translations->where('locale', 'en')[1];
        return view('dashboard.pages.editpages', compact('page', 'arPage', 'enPage'));
    }

    public function editpagedone(Request $request, $id)
    {

        PageTranslation::where(['page_id' => $id, 'locale' => 'ar'])->update([
            'title' => $request->ar['title'],
            'slug' => $request->ar['slug'],
            'content' => $request->ar['content'],
        ]);

        PageTranslation::where(['page_id' => $id, 'locale' => 'en'])->update([
            'title' => $request->en['title'],
            'slug' => $request->en['slug'],
            'content' => $request->en['content'],
        ]);

        Page::where('id', $id)->update([
            'title_page' => $request->ar['title']
        ]);

        return redirect()->route('staticpage');
    }

}

