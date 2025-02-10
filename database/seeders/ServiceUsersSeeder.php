<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class ServiceUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 200; $i++) {
            User::create([
                'first_name' => ucfirst($faker->firstName),
                'middle_name' => ucfirst($faker->optional()->firstName),
                'last_name' => ucfirst($faker->lastName),
                'email' => strtolower($faker->unique()->safeEmail),
                'phone_number' => $faker->unique()->phoneNumber,
                'address' => $faker->address,
                'city' => ucfirst($faker->city),
                'post_code' => strtoupper($faker->postcode),
                'county' => ucfirst($faker->state),
                'country' => ucfirst($faker->country),
                'password' => Hash::make('password123'), // Default password
                'role' => 'service_user',
                'status' => 1, // Active status
                'profile_picture' => 'default.png', // Default profile image
                'activation_token' => null,
                'email_verified_at' => now(),
                'two_factor_auth' => false,
            ]);
        }
    }
}
