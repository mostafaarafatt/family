<?php

namespace App\Http\Controllers\Api\Hotels;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\CancelBookingHotelRequest;
use App\Http\Requests\CitySearchRequest;
use App\Http\Requests\HotelBookRequest;
use App\Http\Requests\HotelContentRequest;
use App\Http\Requests\HotelOfferRequest;
use App\Http\Requests\HotelSearchRequest;
use App\Http\Requests\RoomRatesRequest;
use App\Http\Requests\SearchByCityAndCountryRequest;
use App\Http\Requests\SearchByCityRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use App\Traits\HotelTravelpro;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;

class HotelController extends BaseController
{
    use HotelTravelpro;

    public function hotelSearch(HotelSearchRequest $request)
    {
        $country = Country::whereTranslationLike('country_name',  $request->country_name)->first();
        $countryEnglishWord = $country->translate('en')->country_name;

        $city = City::whereTranslationLike('city_name',  $request->city_name)->first();
        $cityEnglishWord = $city->translate('en')->city_name;
        

        $data = $this->hotelSearchData($request, $cityEnglishWord, $countryEnglishWord);
        $response = Http::post('https://travelnext.works/api/hotel-api-v6/hotel_search', $data);
        return $response->json();
    }

    public function hotelFilter(HotelOfferRequest $request)
    {
        $data = $this->hotelFilterData($request);
        $response = Http::post('https://travelnext.works/api/hotel-api-v6/filterResults', $data);
        return $response->json();
    }

    public function getHotelContact(HotelContentRequest $request)
    {
        $response = Http::get('https://travelnext.works/api/hotel-api-v6/hotelDetails', [
            'sessionId' => $request->safe()->sessionId,
            'hotelId' => $request->safe()->hotelId,
            'productId' => $request->safe()->productId,
            'tokenId' => $request->safe()->tokenId
        ]);

        return $response->json();
    }

    public function roomRates(RoomRatesRequest $request)
    {
        $data = $this->roomRateData($request);
        $response = Http::post('https://travelnext.works/api/hotel-api-v6/get_room_rates', $data);
        return $response->json();
    }

    public function bookingHotel(HotelBookRequest $request)
    {
        // dd($request->paxDetails[0]['adult']['title']);
        $user = auth()->user();
        if ($user->is_active == '0') {
            return $this->sendResponse( __('This user is not active, please contact support'), '400', 400);
        }

        $hotels = $user->hotels;

        $data = $this->bookHotelData($request, $user);
        $response = Http::post('https://travelnext.works/api/hotel-api-v6/hotel_book', $data);

        // return $response->json();

        if ($response['status'] == "CONFIRMED") {

            $hotelInfo = Http::get('https://travelnext.works/api/hotel-api-v6/hotelDetails', [
                'sessionId' => $request->sessionId,
                'hotelId' => $response['roomBookDetails']['hotelId'],
                'productId' => $request->productId,
                'tokenId' => $request->tokenId
            ]);

            $hotel_image = $hotelInfo['hotelImages'][0]['url'];
            $booking_check_in = $response['roomBookDetails']['checkIn'];

            Hotel::create([
                'hotel_name' => $hotelInfo['name'],
                'user_id' => $user->id,
                'country' => $hotelInfo['country'],
                'city' => $hotelInfo['city'],
                'check_in_data' => $response['roomBookDetails']['checkIn'],
                'check_out_data' => $response['roomBookDetails']['checkOut'],
                'stay_duration' => $response['roomBookDetails']['days'],
                'price' => $response['roomBookDetails']['NetPrice'],
                'hotel_rate' => $hotelInfo['hotelRating'],
                'currency' => $response['roomBookDetails']['currency'],
                'hotel_image' => $hotel_image,
                'adult_number' => count($request->paxDetails[0]['adult']['title']),
                'supplierConfirmationNum' => $response['supplierConfirmationNum'],
                'referenceNum' => $response['referenceNum']
            ]);

            // return $hotelInfo;

            // if (count($hotels) > 0) {
            //     // return $user->hotel[0]->check_in_data;
            //     foreach ($user->hotels as $user_hotel) {
            //         $user_check_out_date = $user_hotel->check_out_data;
            //         if ($booking_check_in < $user_check_out_date) {
            //             return response()->json([
            //                 'message' => 'لديك حجز بالفعل'
            //             ]);
            //         } else {
            //             Hotel::create([
            //                 'hotel_name' => $hotelInfo['name'],
            //                 'user_id' => $user->id,
            //                 'country' => $hotelInfo['country'],
            //                 'city' => $hotelInfo['city'],
            //                 'check_in_data' => $response['roomBookDetails']['checkIn'],
            //                 'check_out_data' => $response['roomBookDetails']['checkOut'],
            //                 'stay_duration' => $response['roomBookDetails']['days'],
            //                 'price' => $response['roomBookDetails']['NetPrice'],
            //                 'hotel_rate' => $hotelInfo['hotelRating'],
            //                 'currency' => $response['roomBookDetails']['currency'],
            //                 'hotel_image' => $hotel_image,
            //                 'adult_number' => count($request->paxDetails[0]['adult']['title']),
            //                 'supplierConfirmationNum' => $response['supplierConfirmationNum'],
            //                 'referenceNum' => $response['referenceNum']
            //             ]);

            //             // return response()->json([
            //             //     'message' => 'تم عملية الحجز بنجاح',
            //             //     'response' => $response->json()
            //             // ]);
            //             return $response->json();
            //         }
            //     }
            // } else {
            //     Hotel::create([
            //         'hotel_name' => $hotelInfo['name'],
            //         'user_id' => $user->id,
            //         'country' => $hotelInfo['country'],
            //         'city' => $hotelInfo['city'],
            //         'check_in_data' => $response['roomBookDetails']['checkIn'],
            //         'check_out_data' => $response['roomBookDetails']['checkOut'],
            //         'stay_duration' => $response['roomBookDetails']['days'],
            //         'price' => $response['roomBookDetails']['NetPrice'],
            //         'hotel_rate' => $hotelInfo['hotelRating'],
            //         'currency' => $response['roomBookDetails']['currency'],
            //         'hotel_image' => $hotel_image,
            //         'adult_number' => count($request->paxDetails[0]['adult']['title']),
            //         'supplierConfirmationNum' => $response['supplierConfirmationNum'],
            //         'referenceNum' => $response['referenceNum']
            //     ]);

            //     // return response()->json([
            //     //     'message' => 'تم عملية الحجز بنجاح'
            //     // ]);
            //     return $response->json();
            // }
        } else {
            // return response()->json([
            //     'message' => 'لم تتم عمليه الحجز بنجاح أعد المحاولة'
            // ]);
            return $response->json();
        }

        return $response->json();
    }

    public function cancelBooking(CancelBookingHotelRequest $request)
    {

        $data = $this->cancelBookingData($request);

        $response = Http::post('https://travelnext.works/api/hotel-api-v6/cancel', $data);
        // $cancelReservationHotel = auth()->user()->hotels->where('supplierConfirmationNum', $request->supplierConfirmationNum)->where('referenceNum', $request->referenceNum)->delete();
        $cancelReservationHotel = Hotel::where('user_id', auth()->user()->id)->where('supplierConfirmationNum', $request->supplierConfirmationNum)->where('referenceNum', $request->referenceNum)->delete();
        if ($cancelReservationHotel) {
            return $response->json();
        }
    }

    public function getAllCities(CitySearchRequest $request)
    {
        $response = Http::get('https://travelnext.works/api/hotel-api-v6/cities', [
            'from' => $request->safe()->from,
            'to' => $request->safe()->to,
            'user_id' => $request->safe()->user_id,
            'user_password' => $request->safe()->user_password,
            'ip_address' => $request->safe()->ip_address,
            'access' => $request->safe()->access,
        ]);

        return $response->json();


        // To get all cities using while loop
        // $a = 0;
        // $start = 0;
        // $end = 499;
        // while ($a <= 205) {
        //     // $response = "start=" . $start . " " . "end=" . $end;
        //     $response = Http::get('https://travelnext.works/api/hotel-api-v6/cities', [
        //         'from' => $start,
        //         'to' => $end,
        //         'user_id' => $request->safe()->user_id,
        //         'user_password' => $request->safe()->user_password,
        //         'ip_address' => $request->safe()->ip_address,
        //         'access' => $request->safe()->access,
        //     ]);
        //     // echo $response;

        //     if ($response) {
        //         file_put_contents(public_path('cities'), $response, FILE_APPEND | LOCK_EX);
        //     }

        //     $a++;
        //     $start += 499;
        //     $end += 499;
        //     // echo "</br>";
        // }



    }

    public function searchByCountry(SearchByCityAndCountryRequest $request)
    {
        $countries = Country::when($request->country_name, function ($q) use ($request) {
            return $q->whereTranslationLike('country_name', '%' . $request->country_name . '%');
        })->get();

        return response()->json([
            'countries' => $countries
        ]);
    }

    public function searchByCity(SearchByCityRequest $request)
    {
        $cities = Country::find($request->id)->cities;
        return response()->json([
            'cities' => $cities
        ]);
    }

    public function getAllHotelReservations()
    {
        $hotelResevations = Hotel::where('user_id', auth()->user()->id)->get();
        // dd($hotelResevations);
        return response()->json([
            'data' => $hotelResevations
        ]);
    }
}
