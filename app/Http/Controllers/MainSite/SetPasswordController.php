<?php

namespace App\Http\Controllers\MainSite;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Traits\MainsiteViewSharedDataTrait;
use App\Http\Requests\ChangePasswordRequest;

class SetPasswordController extends Controller
{
    use MainsiteViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }


    public function showSetPasswordForm()
    {
        return view('mainsite.pages.set-password');
    }
    
    
    // Handle password reset request and send the email
     
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(60);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => Carbon::now(),
            ]
        );

        Mail::to($request->email)->send(new PasswordResetMail($request->email, $token));

        return redirect()->route('mainsite.set-password')->with('success', 'A password reset link has been sent to your email.');
    }

    
    // Show the password reset form
     
    public function showResetForm($token)
    {
        return view('mainsite.pages.reset-password', compact('token'));
    }

    
    // Handle the password reset process
     
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $passwordReset = DB::table('password_reset_tokens')->where('token', $request->token)->first();

        if (!$passwordReset) {
            return redirect()->route('mainsite.login')->with('error', 'Invalid or expired reset link.');
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user) {
            return redirect()->route('mainsite.login')->with('error', 'User not found.');
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->password_change_required = false;
        $user->save();


        DB::table('password_reset_tokens')->where('email', $passwordReset->email)->delete();

        return redirect()->route('mainsite.login')->with('success', 'Your password has been reset successfully. You can now login.');
    }


    //CHNAGE PASSWORD IF USER->PASSWORD_CHANGE_REQUIRED IS TRUE

    public function showChangePasswordForm()
    {
        if (!session()->has('changepassword_user')) {
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }

        return view('mainsite.pages.change-password');
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        if (!session()->has('changepassword_user')) {
            return redirect()->route('login')->with('error', 'Session expired. Please login again.');
        }


        // Retrieve user from session
        $user = User::where('email', session('changepassword_user'))->first();

        if (!$user || !Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Incorrect old password.'])->withInput();
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->password_change_required = false;
        $user->save();

        // Authenticate the user
        Auth::login($user);

        // Remove session key
        session()->forget('changepassword_user');

        // Redirect based on user role
        switch ($user->role) {
            case 'admin_level_1':
            case 'admin_level_2':
                return redirect()->route('admin.dashboard')->with('success', 'Your password has been updated successfully!');

            case 'care_giver':
                return redirect()->route('caregiver.dashboard')->with('success', 'Your password has been updated successfully!');

                case 'care_beneficiary':
                case 'family_member':
                    return redirect()->route('carebeneficiary.dashboard')->with('success', 'Your password has been updated successfully!');

            default:
                Auth::logout();
                return back()->withErrors(['email' => 'Unauthorized access.'])->withInput();
        }

    }











}
