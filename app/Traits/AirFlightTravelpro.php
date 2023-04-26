<?php

namespace App\Traits;

use App\Models\AirFlight;

trait AirFlightTravelpro
{

    public function airPortListData($request)
    {
        $data = [
            "user_id" => $request->user_id,
            "user_password" => $request->user_password,
            "access" => $request->access,
            "ip_address" => $request->ip_address
        ];

        return $data;
    }

    public function airFlightSearchData($request)
    {
        $data = [
            "user_id" => $request->user_id,
            "user_password" => $request->user_password,
            "access" => $request->access,
            "ip_address" => $request->ip_address,
            "requiredCurrency" => $request->requiredCurrency,
            "journeyType" => $request->journeyType,
            "OriginDestinationInfo" => [
                [
                    "departureDate" => $request->departureDate,
                    "returnDate" => $request->returnDate,
                    "airportOriginCode" => $request->airportOriginCode,
                    "airportDestinationCode" => $request->airportDestinationCode,
                ]
            ],
            "class" => $request->class,
            "adults" => $request->adults,
            "childs" => $request->childs,
            "infants" => $request->infants
        ];

        return $data;
    }

    public function airFlightBookingData($request)
    {
        // $data = [
        //     "flightBookingInfo" => [
        //         "flight_session_id" => $request->flight_session_id,
        //         "fare_source_code" => $request->fare_source_code,
        //         "IsPassportMandatory" => $request->IsPassportMandatory,
        //         "fareType" => $request->fareType,
        //         "areaCode" => $request->areaCode,
        //         "countryCode" => $request->countryCode
        //     ],
        //     "paxInfo" => [
        //         "clientRef" => $request->clientRef,
        //         "postCode" => $request->postCode,
        //         "customerEmail" => $request->customerEmail,
        //         "customerPhone" => $request->customerPhone,
        //         "bookingNote" => $request->bookingNote,
        //         "paxDetails" => [
        //             [
        //                 "adult" => [
        //                     "title" => $request->adult_title,
        //                     "firstName" => $request->adult_firstName,
        //                     "lastName" => $request->adult_lastName,
        //                     "dob" => $request->adult_dob,
        //                     "nationality" => $request->adult_nationality
        //                 ],
        //                 "child" => [
        //                     "title" => $request->child_title,
        //                     "firstName" => $request->child_firstName,
        //                     "lastName" => $request->child_lastName,
        //                     "dob" => $request->child_dob,
        //                     "nationality" => $request->child_nationality
        //                 ],
        //                 "infant" => [
        //                     "title" => $request->infant_title,
        //                     "firstName" => $request->infant_firstName,
        //                     "lastName" => $request->infant_lastName,
        //                     "dob" => $request->infant_dob,
        //                     "nationality" => $request->infant_nationality
        //                 ]
        //             ]
        //         ]
        //     ]
        // ];

        $data2 = [
            "flightBookingInfo" => [
                "flight_session_id" => $request->flight_session_id,
                "fare_source_code" => $request->fare_source_code,
                "IsPassportMandatory" => $request->IsPassportMandatory,
                "fareType" => $request->fareType,
                "areaCode" => $request->areaCode,
                "countryCode" => $request->countryCode
            ],
            "paxInfo" => [
                "clientRef" => $request->clientRef,
                "postCode" => $request->postCode,
                "customerEmail" => $request->customerEmail,
                "customerPhone" => $request->customerPhone,
                "bookingNote" => $request->bookingNote,
                "paxDetails" => [
                    [
                        "adult" => [
                            "title" => $request->adult_title,
                            "firstName" => $request->adult_firstName,
                            "lastName" => $request->adult_lastName,
                            "dob" => $request->adult_dob,
                            "nationality" => $request->adult_nationality,
                            "passportNo" => $request->adult_passportNo,
                            "passportIssueCountry" => $request->adult_passportIssueCountry,
                            "passportExpiryDate" => $request->adult_passportExpiryDate
                        ],
                        "child" => [
                            "title" => $request->child_title,
                            "firstName" => $request->child_firstName,
                            "lastName" => $request->child_lastName,
                            "dob" => $request->child_dob,
                            "nationality" => $request->child_nationality,
                            "passportNo" => $request->child_passportNo,
                            "passportIssueCountry" => $request->child_passportIssueCountry,
                            "passportExpiryDate" => $request->child_passportExpiryDate
                        ],
                        "infant" => [
                            "title" => $request->infant_title,
                            "firstName" => $request->infant_firstName,
                            "lastName" => $request->infant_lastName,
                            "dob" => $request->infant_dob,
                            "nationality" => $request->infant_nationality,
                            "passportNo" => $request->infant_passportNo,
                            "passportIssueCountry" => $request->infant_passportIssueCountry,
                            "passportExpiryDate" => $request->infant_passportExpiryDate
                        ]
                    ]
                ]
            ]
        ];

        return $data2;
    }

    public function storeAirFlightBooking($user, $request, $response)
    {
        $createAirFlight = AirFlight::create([
            'user_id' => $user->id,
            'user_email' => $user->email,
            'joureny_type' => $request->journeyType,
            'departure_data' => $request->departureDate,
            'returend_data' => $request->returnDate,
            'adults' => $request->adults,
            'childes' => $request->childs,
            'infants' => $request->infants,
            'travel_class' => $request->class,
            'price' => $request->price,
            'currency' => $request->currency,
            'uniqueId' => $response['BookFlightResponse']['BookFlightResult']['UniqueID'],
            'origin_airport' => $request->originAirportName,
            'destination_airport' => $request->destinationAirportName,
            'totalStops' => $request->totalStops,
            'flightNumber' => $request->flightNumber,
            'journeyDuration' => $request->journeyDuration,
            'marketingAirlineName' => $request->marketingAirlineName,
        ]);

        return $createAirFlight;
    }

    public function cancelAirFlightBookingData($request)
    {
        $data = [
            "user_id" => $request->user_id,
            "user_password" => $request->user_password,
            "access" => $request->access,
            "ip_address" => $request->ip_address,
            "UniqueID" => $request->UniqueID
        ];

        return $data;
    }
}
