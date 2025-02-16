<?php

namespace App\Http\Controllers\MainSite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\CarerRegistrationConfirmation;
use App\Traits\MainsiteViewSharedDataTrait;
use Illuminate\Support\Facades\RateLimiter;
use App\Mail\CarerRegistrationAdminNotification;

class CarersController extends Controller
{
    use MainsiteViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }

    public function index()
    {        
        return view('mainsite.pages.carers');
    }

    //Show the carers registration page.
    public function showRegisterForm()
    {
        return view('mainsite.pages.carers-registration');
    }

 
    // Handle carer registration submission
    public function submitCarerRegister(Request $request)
    {
        $ip = $request->ip();
        $key = 'carer_registration_' . $ip;

        // Check for honeypot field
        if (!empty($request->input('website'))) {
            Log::warning('Honeypot triggered: Potential bot detected.', ['ip' => $ip]);
            return back()->withErrors(['error' => 'Spam detected.']);
        }

        // Apply rate limiting to prevent spam
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return back()->withErrors(['error' => 'Too many registration attempts. Please try again later.']);
        }
        RateLimiter::hit($key, 60); // Allow max 5 attempts per minute

        // Validate the form inputs along with the reCAPTCHA
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        // Store form data
        $carerData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ];

        // Send email to admin
        try {
            Mail::to(env('MAIL_USERNAME'))->send(new CarerRegistrationAdminNotification($carerData));

            // Send confirmation email to the carer
            Mail::to($request->email)->send(new CarerRegistrationConfirmation($carerData));
        } catch (\Exception $e) {
            Log::error('Failed to send registration emails: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to send confirmation email. Please try again later.']);
        }

        // Redirect back with success message
        return back()->with('success', 'Thank you for your interest in CarePass! We will get back to you as soon as possible.');
    }
}
