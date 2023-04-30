<?php

namespace App\Http\Controllers\Dashboard\Reports;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Report;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::all();
        return view('dashboard.reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.reports.add_report');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $admin_id = Auth::guard('admin')->id();
        $admin = Admin::find($admin_id);

        $report = $admin->reports()->create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        $report->update(['is_published' => '1', 'published_at' => Carbon::now()->format('Y/m/d H:i:s')]);


        if ($images = $request->file('images')) {
            foreach ($images as $image) {
                $report->addMedia($image)->toMediaCollection('report_image');
            }
        }

        return redirect()->route('reports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return view('dashboard.reports.report_details', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        Report::find($report->id)->delete();
        return back();
    }

    public function deleteReport(Request $request)
    {
        Report::where('id', $request->report_id)->delete();
        return back();
    }

    public function reportActivation($id)
    {
        $report = Report::where('id', $id)->first();
        $activeReport = $report->is_active;
        if ($activeReport == '1') {
            $report->update(['is_active' => '0']);
        } else {
            $report->update(['is_active' => '1']);
        }

        return back();
    }

    public function reportPubliched($id)
    {
        $report = Report::where('id', $id)->first();
        $publishReport = $report->is_published;
        if ($publishReport == '1') {
            $report->update(['is_published' => '0', 'published_at' => null]);
        } else {
            $report->update(['is_published' => '1', 'published_at' => Carbon::now()->format('Y/m/d H:i:s')]);
        }

        return back();
    }
}
