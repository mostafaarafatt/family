<?php

namespace App\Http\Controllers\Api\AirFlights;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\AirFlightBookRequest;
use App\Http\Requests\AirPriceRequest;
use App\Http\Requests\AirSearchRequest;
use App\Http\Requests\CancelBookingAirFlightRequest;
use App\Models\AirFlight;
use App\Requests\Hotels\HotelSearchValidation;
use App\Traits\AirFlightTravelpro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AirFlightController extends BaseController
{
    use AirFlightTravelpro;

    public function airPortList(Request $request)
    {
        $data = $this->airPortListData($request);
        $response = Http::post('https://travelnext.works/api/aeroVE5/airport_list', $data);
        return response()->json([
            'data' => $response->json()
        ]);
    }

    public function airFlightSearch(AirSearchRequest $request)
    {
        $data = $this->airFlightSearchData($request);
        $response = Http::post('https://travelnext.works/api/aeroVE5/availability', $data);
        return $response->json();
    }

    public function validateFare(AirPriceRequest $request)
    {
        $data = [
            "session_id" => $request->session_id,
            "fare_source_code" => $request->fare_source_code
        ];

        $response = Http::post('https://travelnext.works/api/aeroVE5/revalidate', $data);
        return $response->json();
    }

    public function airFlightBooking(AirFlightBookRequest $request)
    {
        $user = auth()->user();
        if ($user->is_active == '0') {
            return $this->sendResponse( __('This user is not active, please contact support'), '400', 400);
        }

        $data = $this->airFlightBookingData($request);
        $response = Http::post("https://travelnext.works/api/aeroVE5/booking", $data);

        if ($response['BookFlightResponse']['BookFlightResult']['Status'] == "CONFIRMED") {

            $booking = $this->storeAirFlightBooking($user,$request,$response);
            // dd($booking);
            return $response->json();

        } else {
            return $response->json();
        }
    }

    public function cancelAirFlightBooking(CancelBookingAirFlightRequest $request)
    {
        $data = $this->cancelAirFlightBookingData($request);
        $response = Http::post('https://travelnext.works/api/aeroVE5/cancel', $data);

        $cancelReservationAirFlight = AirFlight::where('user_id', auth()->user()->id)->where('UniqueID', $request->UniqueID)->delete();
        if ($cancelReservationAirFlight) {
            return $response->json();
        }
    }

    public function getAllAirFightReservations()
    {
        $airFlightResevations = AirFlight::where('user_id', auth()->user()->id)->get();
        return response()->json([
            'data' => $airFlightResevations
        ]);
    }
}
