<?php

namespace App\Traits;

trait HotelTravelpro
{

    public function roomRateData($request)
    {
        $data = [
            "sessionId" => $request->sessionId,
            "productId" => $request->productId,
            "tokenId" => $request->tokenId,
            "hotelId" => $request->hotelId
        ];
        return $data;
    }

    public function hotelSearchData($request,$cityEnglishWord,$countryEnglishWord)
    {
        $data = [
            "user_id" => $request->user_id,
            "user_password" => $request->user_password,
            "access" => $request->access,
            "ip_address" => $request->ip_address,
            "checkin" => $request->checkin,
            "checkout" => $request->checkout,
            "city_name" => $cityEnglishWord,
            "country_name" => $countryEnglishWord,
            "occupancy" => [
                [
                    "room_no" => $request->occupancy[0]['room_no'],
                    "adult" => $request->occupancy[0]['adult'],
                    "child" => 0,
                    "child_age" => [
                        0
                    ]
                ]
            ],
            "requiredCurrency" => $request->requiredCurrency,
            "requiredLanguage" => $request->requiredLanguage,
            "maxResult" => $request->maxResult
        ];

        // $data = [
        //     "user_id" => $request->user_id,
        //     "user_password" => $request->user_password,
        //     "access" => $request->access,
        //     "ip_address" => $request->ip_address,
        //     "checkin" => $request->checkin,
        //     "checkout" => $request->checkout,
        //     "city_name" => $request->city_name,
        //     "country_name" => $request->country_name,
        //     "occupancy" => [
        //         [
        //             "room_no" => $request->room_no,
        //             "adult" => $request->adult,
        //             "child" => $request->child,
        //             "child_age" => [
        //                 0
        //             ]
        //         ]
        //     ],
        //     "requiredCurrency" => $request->requiredCurrency,
        //     "requiredLanguage" => $request->requiredLanguage,
        //     "maxResult" => $request->maxResult
        // ];

        return $data;
    }

    public function hotelFilterData($request)
    {
        $data = [
            "sessionId" => $request->sessionId,
            "maxResult" => $request->maxResult,
            "filters" => [
                "price" => [
                    "min" => $request->filters['price']['min'],
                    "max" => $request->filters['price']['max']
                ],
                "rating" => $request->filters['rating'],
                "sorting" => $request->filters['sorting'],
            ]
        ];

        return $data;
    }

    public function bookHotelData($request, $user)
    {
        $data = [
            "sessionId" => $request->sessionId,
            "productId" => $request->productId,
            "tokenId" => $request->tokenId,
            "rateBasisId" => $request->rateBasisId,
            "clientRef" => $request->clientRef,
            "customerEmail" => $user->email,
            "customerPhone" => $user->phone,
            "bookingNote" => $request->bookingNote,
            "paxDetails" => [
                [
                    "room_no" => $request->paxDetails[0]['room_no'],
                    "adult" => [
                        "title" => $request->paxDetails[0]['adult']['title'],
                        "firstName" => $request->paxDetails[0]['adult']['firstName'],
                        "lastName" => $request->paxDetails[0]['adult']['lastName']
                    ]
                ]
            ]
        ];

        return $data;
    }

    public function cancelBookingData($request)
    {
        $data = [
            "user_id" => $request->user_id,
            "user_password" => $request->user_password,
            "access" => $request->access,
            "ip_address" => $request->ip_address,
            "supplierConfirmationNum" => $request->supplierConfirmationNum,
            "referenceNum" => $request->referenceNum
        ];

        return $data;
    }
}
