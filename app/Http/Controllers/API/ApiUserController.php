<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\UserCreateTrait;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Validation\ValidationException;

class ApiUserController extends Controller
{
    use UserCreateTrait;

    /**
     * Store a newly created user.
     */
    public function store(RegisterUserRequest $request)
    {
        try {
 
            $role = 'service_user';

            // Call trait method to create the user
            $user = $this->createUser($request->validated(), $role);

            return response()->json([
                'message' => 'User created successfully',
                'user' => $user
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
