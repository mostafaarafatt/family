<?php

namespace App\Http\Controllers\Dashboard\AirFlights;

use App\Http\Controllers\Controller;
use App\Models\AirFlight;
use Illuminate\Http\Request;

class AirFlightController extends Controller
{

    public function __construct()
    {
        // عشان لو حد ليه صلاحيه معينه وميدرش يعملها ... ولو أخدت اللينك بتاعها وفتحته فى مكان تانى ميفتحش معايا
        $this->middleware(['permission:airflight_reservations-read'])->only('index');
        $this->middleware(['permission:airflight_reservations-create'])->only('create');
        $this->middleware(['permission:airflight_reservations-update'])->only('edit');
        $this->middleware(['permission:airflight_reservations-delete'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airFlightReservations = AirFlight::all();
        // dd($airFlightReservations);
        return view('dashboard.air_flights.index', compact('airFlightReservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $airFlightReservation = AirFlight::where('id', $id)->first();
        $user = $airFlightReservation->user;

        return view('dashboard.air_flights.airflight_reservation_details', compact('airFlightReservation', 'user'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
