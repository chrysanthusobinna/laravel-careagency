<?php

namespace App\Http\Controllers\CareGivers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\AuthUserViewSharedDataTrait;
use App\Http\Requests\ChangePasswordRequest;

class AuthCareGiverController extends Controller
{
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }


    // Show the profile of the authenticated servcie  user.
    public function show()
    {

        return view('caregivers.pages.auth-caregiver-profile');
    }


     //Show the change password form for the caregiver.

    public function showChangePasswordForm()
    {
        return view('caregivers.pages.change-password');
    }


     //Handle the password update request.

    public function updatePassword(ChangePasswordRequest $request)
    {


        // Get the authenticated user's ID
        $authUserId = Auth::id(); 

        // Retrieve the fresh user object from the database
        $user = User::find($authUserId);

        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        // Check if the old password is correct
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'The old password is incorrect.');
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('caregiver.dashboard')->with('success', 'Your password has been updated successfully!');
    }


}
