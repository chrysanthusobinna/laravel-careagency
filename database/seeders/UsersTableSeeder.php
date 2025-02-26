<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Create 5 care_beneficiary role users
        for ($i = 0; $i < 5; $i++) {
            $user = User::create([
                'role' => 'care_beneficiary',
                'status' => '1',
                'notice' => null,
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'city' => $faker->city,
                'post_code' => $faker->postcode,
                'county' => $faker->state,
                'country' => $faker->country,
                'profile_picture' => 'default.png',
                'activation_token' => Str::random(40),
                'two_factor_auth' => 0,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ]);
        }

        // Create 5 family_member role users
        for ($i = 0; $i < 5; $i++) {
            $user = User::create([
                'role' => 'family_member',
                'status' => '1',
                'notice' => null,
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'city' => $faker->city,
                'post_code' => $faker->postcode,
                'county' => $faker->state,
                'country' => $faker->country,
                'profile_picture' => 'default.png',
                'activation_token' => Str::random(40),
                'two_factor_auth' => 0,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ]);
        }

        // Create 5 care_giver role users
        for ($i = 0; $i < 5; $i++) {
            $user = User::create([
                'role' => 'care_giver',
                'status' => '1',
                'notice' => null,
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'city' => $faker->city,
                'post_code' => $faker->postcode,
                'county' => $faker->state,
                'country' => $faker->country,
                'profile_picture' => 'default.png',
                'activation_token' => Str::random(40),
                'two_factor_auth' => 0,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
