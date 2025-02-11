<?php

namespace App\Http\Controllers\MainSite;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                return redirect()->route('mainsite.verify-email')->with('error', 'Please verify your email before logging in.');
            }
    
            // Authenticate user only after all checks pass
            Auth::login($user);
    
            // Redirect based on user role
            switch ($user->role) {
                case 'admin_level_1':
                case 'admin_level_2':
                    return redirect()->route('admin.dashboard')->with('success', 'Welcome to the Admin Dashboard!');
    
                case 'care_giver':
                    return redirect()->route('caregiver.dashboard')->with('success', 'Welcome to the Caregiver Dashboard!');
    
                case 'service_user':
                    return redirect()->route('serviceuser.dashboard')->with('success', 'Welcome to your Service User Dashboard!');
    
                default:
                    Auth::logout();
                    return back()->withErrors(['email' => 'Unauthorized access.'])->withInput();
            }
        }
    
        // If authentication fails
        return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
    }
    
}
