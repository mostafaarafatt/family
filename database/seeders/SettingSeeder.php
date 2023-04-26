<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Setting::create([
            'social_media' => [
                'Facebook' => 'https://facebook.com',
                'Youtube' => 'https://youtube.com',
                'Instagram' => 'https://instagram.com',
                'Snap Chat' => 'https://snapchat.com'
            ],
            'phone_number' => '0512548578',
            'app_rate' => '1',
        ]);
    }
}
