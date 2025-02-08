<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;

trait HandlesUserRegistration
{
    /**
     * Register a new user.
     *
     * @param array $data
     * @param string $role
     * @return User
     * @throws Exception
     */
    public function createUser(array $data, string $role)
    {
        try {
            return User::create([
                'first_name' => $data['first_name'],
                'middle_name' => $data['middle_name'] ?? null,
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'address' => $data['address'],
                'city' => $data['city'],
                'post_code' => $data['post_code'],
                'county' => $data['county'] ?? null,
                'country' => $data['country'],
                'password' => Hash::make($data['password']),  
                'role' => $role,
                'status' => 1, // Default status active
                'activation_token' => Str::random(60),
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
