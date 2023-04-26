<?php

use App\Http\Controllers\Api\AirFlights\AirFlightController;
use App\Http\Controllers\Api\Amadeus\AmadeusAuthController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\UserController;
use App\Http\Controllers\Api\Hotels\HotelController;
use App\Http\Controllers\Api\Pages\ContactController;
use App\Http\Controllers\Api\Pages\PageController;
use App\Http\Controllers\SliderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('authroization', [AmadeusAuthController::class, 'authroization']);

Route::controller(HotelController::class)->group(function () {
    Route::get('getAllCities', 'getAllCities');
    Route::post('hotelSearch', 'hotelSearch');
    Route::get('hotelFilter', 'hotelFilter');
    Route::get('getHotelContact', 'getHotelContact');
    Route::post('roomRates', 'roomRates');
    Route::get('searchByCountry','searchByCountry');
    Route::get('searchByCity','searchByCity');
});

Route::controller(AirFlightController::class)->group(function () {
    Route::post('airFlightSearch', 'airFlightSearch');
    Route::post('validateFare', 'validateFare');
    Route::post('airPortList', 'airPortList');
    Route::post('airFlightBooking', 'airFlightBooking');
});


Route::post('contactInfo', [ContactController::class, 'store']);
Route::get('sliderImages', [SliderController::class, 'getSliderImages']);
Route::get('staticPages', [PageController::class, 'staticPages']);
Route::get('getfqaPage', [PageController::class, 'getfqaPage']);

Route::controller(RegisterController::class)->group(function () {
    Route::post('register', 'register')->name('register');
    Route::post('login', 'login');
    Route::post('checkCode', 'checkCode');
    Route::post('forgetPassword', 'forgetPassword');
    Route::post('verifyCode', 'verifyCode');
    Route::post('setNewPassword', 'setNewPassword');
    Route::post('resendCode', 'resendCode');
    Route::get('getAllNationalities','getAllNationalities');
});


Route::middleware('auth:sanctum')->group(function () {

    Route::controller(RegisterController::class)->group(function () {
        Route::post('logout', 'logout');
        Route::post('completeReqister', 'completeReqister');
        Route::get('deleteAccount', 'deleteAccount');
    });

    Route::controller(UserController::class)->group(function () {
        Route::post('updateProfile', 'updateProfile');
        Route::post('changePassword', 'changePassword');
    });

    Route::controller(HotelController::class)->group(function () {
        Route::post('bookingHotel', 'bookingHotel');
        Route::post('cancelBooking', 'cancelBooking');
        Route::get('getAllHotelReservations', 'getAllHotelReservations');
    });

    Route::controller(AirFlightController::class)->group(function () {
        Route::post('airFlightBooking', 'airFlightBooking');
        Route::post('cancelAirFlightBooking', 'cancelAirFlightBooking');
        Route::get('getAllAirFightReservations', 'getAllAirFightReservations');
    });
});
