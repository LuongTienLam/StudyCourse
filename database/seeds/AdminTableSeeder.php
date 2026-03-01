<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'fullname' => 'Huynh Dong',
            'email' => 'd01295306466@gmail.com',
            'password' => Hash::make('123123123'),
            'phone' => '0839243436',
            'role' => 'Admin',
        ]);
    }
}
