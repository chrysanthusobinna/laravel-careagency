<?php

namespace App\Http\Controllers\MainSite;
use Carbon\Carbon;
use App\Traits\UserCreateTrait;
use App\Mail\ServiceUserWelcome;
use App\Mail\ServiceUserActivation;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterUserRequest;
use App\Mail\AdminServiceUserNotification;
use App\Traits\MainsiteViewSharedDataTrait;
use Illuminate\Support\Facades\RateLimiter;

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
        // Block registration if request count exceeds 5 per minute
        $ip = $request->ip();
        $key = 'register:' . $ip;
    
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return response()->json(['message' => 'Too many registration attempts. Please try again later.'], 429);
        }
    
        // Increment the attempts
        RateLimiter::hit($key, 60); // 60 seconds = 1 minute
    
        // Check for honeypot field
        if (!empty($request->input('website'))) {
            Log::warning('Honeypot triggered. Possible bot detected.', ['ip' => $ip]);
            return redirect()->back()->withErrors(['error' => 'Spam detected.']);
        }
    
        // Validate reCAPTCHA
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
        ]);
    
        // Validate email domain (allow only trusted domains)
        $allowedDomains = ['gmail.com', 'yahoo.com', 'hotmail.com', 'nhs.uk'];
        $emailDomain = substr(strrchr($request->email, "@"), 1);
        if (!in_array($emailDomain, $allowedDomains)) {
            Log::warning('Unapproved email domain registration attempt.', ['email' => $request->email, 'ip' => $ip]);
            return redirect()->back()->withErrors(['email' => 'Email domain not allowed.']);
        }
    
        // Create the user
        $role = 'service_user';
        $password_change_required = 0;
        $user = $this->createUser($request->validated(), $role, $password_change_required);
    
        // Generate 6-digit activation token
        $activationToken = mt_rand(100000, 999999);
        $user->activation_token = $activationToken;
        $user->save();
    
        // Store the email in session
        session(['activation_email_address' => $user->email]);
    
        // Log IP and User-Agent
        Log::info('New user registration', [
            'email' => $user->email,
            'ip' => $ip,
            'user_agent' => $request->header('User-Agent')
        ]);
    
        // Send emails
        try {
            Mail::to(env('MAIL_USERNAME'))->send(new AdminServiceUserNotification($user));
            Mail::to($user->email)->send(new ServiceUserWelcome($user));
            Mail::to($user->email)->send(new ServiceUserActivation($user, $activationToken));
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
        }
    
        return redirect()->route('mainsite.verify-email')->with('success', 'Registration successful! Please check your email to verify your account.');
    }
    
    
}
