<?php

namespace App\Http\Controllers\Api\Pages;

use App\Http\Controllers\Controller;
use App\Models\Fqa;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function staticPages(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|numeric|min:1',
        ]);

        //dd($request->id);

        $page = Page::find($request->id);
        //dd($page);
        if (!$page) {
            return response()->json(['data' => 'There is no data to be shown', 'status' => "faild", 'code' => 404]);
        }
        return response()->json(['data' => $page, 'status' => "success", 'code' => 200]);
    }

    public function getfqaPage()
    {
        $fqa = Fqa::all();
        if (!$fqa) {
            return response()->json(['data' => 'There is no data to be shown', 'status' => "faild", 'code' => 404]);
        }
        return response()->json(['data' => $fqa, 'status' => "success", 'code' => 200]);
    }
}
