<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => 'Ahmed',
            'phone'=> '0512369854',
            'password' =>bcrypt('12345678'),
            'otpCode'=> 1801,
            'email'=> 'ahmed@yahoo.com',
           
            'is_checked'=> '1',
            'is_completed'=> '0',
            'is_active'=> '1',
        ]);

        User::create([
            'name' => 'Mostafa',
            'phone'=> '0512369855',
            'password' =>bcrypt('12345678'),
            'otpCode'=> 1801,
            'email'=> 'mostafa@yahoo.com',
           
            'is_checked'=> '1',
            'is_completed'=> '0',
            'is_active'=> '1',
        ]);
    }
}
