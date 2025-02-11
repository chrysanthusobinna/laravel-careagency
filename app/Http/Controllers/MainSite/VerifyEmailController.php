<?php

namespace App\Http\Controllers\MainSite;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ServiceUserActivation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Traits\MainsiteViewSharedDataTrait;

class VerifyEmailController extends Controller
{
    use MainsiteViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }

    public function showVerifyEmailForm()
    {
        // Check if activation email session exists
        if (!session()->has('activation_email_address')) {
            return redirect()->route('mainsite.login')->with('error', 'Invalid request or token has expired. Please log in again.');
        }
    
        return view('mainsite.pages.verify-email');
    }
    
    public function verifyEmail(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'activation_token' => 'required|digits:6',
        ]);

        // Find user by email
        $user = User::where('email', $request->email)->where('activation_token', $request->activation_token)->first();

        if ($user) {
            // Activate account
            $user->email_verified_at = Carbon::now();
            $user->activation_token = null; 
            $user->save();

            return redirect()->route('mainsite.login')->with('success', 'Your account has been activated! You can now log in.');
        }

        return back()->withErrors(['email' => 'Incorrect email or activation code.']);
    }

    public function resendActivationToken(Request $request)
    {
        // Check if the session exists
        if (!session()->has('activation_email_address')) {
            return redirect()->route('mainsite.login')->with('error', 'Invalid request or token has expired. Please log in again. xxx');
        }
    
        // Retrieve the user using the stored email
        $email = session('activation_email_address');
        $user = User::where('email', $email)->first();
    
        if (!$user) {
            return redirect()->route('mainsite.login')->with('error', 'Invalid request or token has expired. Please log in again. yy');
        }
    
        // Generate a new 6-digit activation token
        $activationToken = mt_rand(100000, 999999);
    
        // Update the user activation token in the database
        $user->activation_token = $activationToken;
        $user->save();
    
        try {
            // Send the activation email
            Mail::to($user->email)->send(new ServiceUserActivation($user, $activationToken));
        } catch (\Exception $e) {
            \Log::error('Resend Activation Email failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to resend activation email. Please try again later.');
        }
    
        return back()->with('success', 'A new activation token has been sent to your email.');
    }
    
    
}
