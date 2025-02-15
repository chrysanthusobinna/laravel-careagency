<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;

trait UserCreateTrait
{
    /**
     * Register a new user.
     *
     * @param array $data
     * @param string $role
     * @param int $password_change_required
     * @return User
     * @throws Exception
     */
    public function createUser(array $data, string $role, int $password_change_required = 0)
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
                'profile_picture' => 'default.png',
                'password' => Hash::make($data['password']),  
                'role' => $role,
                'status' => 1, // Default status active
                'activation_token' => Str::random(60),
                'password_change_required' => $password_change_required, 
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
