<?php

namespace App\Http\Controllers\MainSite;
use App\Traits\UserCreateTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Traits\MainsiteViewSharedDataTrait;

class ServiceUsersRegisterController extends Controller
{
    use UserCreateTrait;
    use MainsiteViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }
    
    public function showRegisterForm()
    {
        return view('mainsite.pages.serviceusers-registration');
    }

    public function submitRegisterForm(RegisterUserRequest $request)
    {
        $role = 'service_user'; 

        // Call trait method to create the user
        $user = $this->createUser($request->validated(), $role);

        return redirect()->route('mainsite.verify-email')->with('success', 'Registration successful! Please check your email to verify your account.');
    }
}
