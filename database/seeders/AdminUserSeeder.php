<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'admin_level_1', 
            'status' => '1', 
            'notice' => null,
            'first_name' => 'Chrysanthus',
            'middle_name' => 'O',
            'last_name' => 'Chiagwah',
            'phone_number' => '1234567890',
            'address' => '123 Admin Street',
            'city' => 'Admin City',
            'post_code' => 'AD1234',
            'county' => 'Admin County',
            'country' => 'Adminland',
            'profile_picture' => 'default.png',
            'activation_token' => Str::random(40),
            'two_factor_auth' => 0, 
            'email' => 'chrysanthusobinnaxx@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);


        User::create([
            'role' => 'admin_level_1', 
            'status' => '1', 
            'notice' => null,
            'first_name' => 'Tina',
            'middle_name' => null,
            'last_name' => 'Ossai',
            'phone_number' => '07588881958',
            'address' => '19 - 21 Albion Place',
            'city' => 'Maidstone',
            'post_code' => 'ME14 5EG',
            'county' => 'Kent',
            'country' => 'United Kingdom',
            'profile_picture' => 'default.png',
            'activation_token' => Str::random(40),
            'two_factor_auth' => 0, 
            'email' => 'tinaossai11@yahoo.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Winner4life'),
            'remember_token' => Str::random(10),
        ]);        


    }
}
