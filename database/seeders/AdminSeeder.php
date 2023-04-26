<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin Seeder
        $super_admin = Admin::create([
            'name' => 'mostafaarafat', 
            'email' => 'admin@yahoo.com',
            'phone' => '0521521452',
            'password' => bcrypt('12345678'),
        ]);
        $super_admin->attachRole('super_admin');

    }
}
