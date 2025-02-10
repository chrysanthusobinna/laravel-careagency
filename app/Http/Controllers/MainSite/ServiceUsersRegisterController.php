<?php

namespace App\Http\Controllers\MainSite;

use Illuminate\Http\Request;
use App\Traits\CompanyContactTrait;
use App\Http\Controllers\Controller;
use App\Traits\UserCreateTrait;
use App\Http\Requests\RegisterUserRequest;

class ServiceUsersRegisterController extends Controller
{
    use CompanyContactTrait;
    use UserCreateTrait;

    public function __construct()
    {
        $companyContact = $this->getCompanyContact();

        view()->share([
            'companyContact' => $companyContact

        ]);
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
