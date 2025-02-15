<?php

namespace App\Http\Controllers\MainSite;
use App\Traits\UserCreateTrait;
use App\Mail\ServiceUserWelcome;
use App\Mail\ServiceUserActivation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterUserRequest;
use App\Mail\AdminServiceUserNotification;
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
        $password_change_required = 0;

        // Create user
        $user = $this->createUser($request->validated(), $role, $password_change_required);
    
        // Generate 6-digit activation token
        $activationToken = mt_rand(100000, 999999);
        $user->activation_token = $activationToken;
        $user->save();
 
        // Store the email in session before redirecting to email verification page
        session(['activation_email_address' => $user->email]);

        try {
            // Send emails
            Mail::to(env('MAIL_USERNAME'))->send(new AdminServiceUserNotification($user));
            Mail::to($user->email)->send(new ServiceUserWelcome($user));
            Mail::to($user->email)->send(new ServiceUserActivation($user, $activationToken));
        } catch (\Exception $e) {
            \Log::error('Email sending failed: ' . $e->getMessage());
        }
    
        return redirect()->route('mainsite.verify-email')->with('success', 'Registration successful! Please check your email to verify your account.');
    }
    
}
