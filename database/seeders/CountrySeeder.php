<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder{

    public function run()
    {
        $countries_en = ['Saudi Arabia','Egypt'];
        $countries_ar = ['المملكة العربية السعودية','القاهرة'];

        for ($i=0; $i <2 ; $i++) { 
            Country::create(
                [
                    'en' => [
                        'country_name' => $countries_en[$i],
                    ],
                    'ar' => [
                        'country_name' => $countries_ar[$i],
                    ]
                ]
            );
        }
        
    }

}