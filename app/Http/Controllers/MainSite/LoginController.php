<?php

namespace App\Http\Controllers\MainSite;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ServiceUserActivation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Traits\MainsiteViewSharedDataTrait;

class LoginController extends Controller
{
    use MainsiteViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }
   
   //Show the login form.
   public function showLoginForm()
   {
    session()->forget(['activation_email_address', 'activation_email_address', 'changepassword_user']);

   
       return view('mainsite.pages.login');
   }
   
 
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
    
            if ($user->status == 0) {
                return back()->withErrors(['email' => 'Your account is inactive. Please contact support.'])->withInput();
            }
    
            if (!$user->email_verified_at) {
                // Generate a new activation token
                $activationToken = mt_rand(100000, 999999); // 6-digit token
                $user->activation_token = $activationToken;
                $user->save();
    
                // Store the email in session before redirecting to email verification page
                session(['activation_email_address' => $user->email]);

                // Send activation email
                try {
                    Mail::to($user->email)->send(new ServiceUserActivation($user, $activationToken));
                } catch (\Exception $e) {
                    \Log::error('Email sending failed: ' . $e->getMessage());
                }
    
                return redirect()->route('mainsite.verify-email')->with('error', 'A new activation code has been sent to your email. Please verify your email before logging in.');
            }

            // Check if password change is required
            if ($user->password_change_required) {
                session(['changepassword_user' => $user->email]);
                return redirect()->route('password.change')->with('warning', 'You must change your password before accessing your account.');
            }

    
            // Authenticate user only after all checks pass
            Auth::login($user);
    
            // login success message
            $loginMessage = 'Welcome, you have logged in successfully.';

            // Redirect based on user role
            switch ($user->role) {
                case 'admin_level_1':
                case 'admin_level_2':
                    return redirect()->route('admin.dashboard')->with('success', $loginMessage);

                case 'care_giver':
                    return redirect()->route('caregiver.dashboard')->with('success', $loginMessage);

                case 'care_beneficiary':
                    return redirect()->route('carebeneficiary.dashboard')->with('success', $loginMessage);

                case 'family_member':
                    return redirect()->route('familymember.dashboard')->with('success', $loginMessage);

                default:
                    Auth::logout();
                    return back()->withErrors(['email' => 'Unauthorized access.'])->withInput();
            }


        }
    
        // If authentication fails
        return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
    }
    
    
}
