<?php

namespace App\Http\Controllers\CareGivers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\UserViewTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\AuthUserViewSharedDataTrait;

class AuthCareGiverController extends Controller
{
    use UserViewTrait;
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }


    // Show the profile of the authenticated servcie  user.
    public function show()
    {
        // $userId = Auth::id();  
        // $user = $this->getUserById($userId);  

        return view('caregivers.pages.auth-caregiver-profile');
    }
}
