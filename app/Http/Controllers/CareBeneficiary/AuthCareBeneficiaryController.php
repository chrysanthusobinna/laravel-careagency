<?php

namespace App\Http\Controllers\CareBeneficiary;

use App\Models\User;
use App\Models\FamilyMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;
use App\Traits\AuthUserViewSharedDataTrait;
use App\Http\Requests\ChangePasswordRequest;

class AuthCareBeneficiaryController extends Controller
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
        return view('carebeneficiary.pages.auth-user-profile');
    }
    


     //Show the change password form for the service user.
    public function showChangePasswordForm()
    {
        return view('carebeneficiary.pages.change-password');
    }


     //Handle the password update request.

    public function updatePassword(ChangePasswordRequest $request)
    {

        // Get the authenticated user's ID
        $authUserId = Auth::id(); 
        $user = User::find($authUserId);

        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'The old password is incorrect.');
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('carebeneficiary.dashboard')->with('success', 'Your password has been updated successfully!');
    }



    // SHOW EDIT PROFILE  
    public function editProfile()
    {
        // $loggedInUser is already passed to the view
        return view('carebeneficiary.pages.edit-my-profile');
    }

    // UPDATE  PROFILE
    public function updateProfile(UpdateUserRequest $request)
    {
        $authUserId = Auth::id(); 
        $user = User::find($authUserId);

        $user->update($request->validated());

        return redirect()->route('carebeneficiary.auth-profile.show')->with('success', 'Your profile has been updated successfully!');
    }

}
