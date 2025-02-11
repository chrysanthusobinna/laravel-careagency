<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Helpers\UserHelper;
use App\Helpers\CompanyContactHelper;

trait AuthUserViewSharedDataTrait
{
    public function shareViewData()
    {
        // Get the logged-in user
        $loggedInUser = Auth::user();

        if ($loggedInUser) {
            // Use helper functions to get initials and formatted role
            $loggedInUser->initials = UserHelper::getInitials($loggedInUser->first_name, $loggedInUser->last_name);
            $loggedInUser->formatted_role = UserHelper::formatUserRole($loggedInUser->role);
        }

        // Define color classes array
        $colorClasses = ['primary', 'secondary', 'success', 'danger', 'info'];

        // Company Contact
        $companyContact = CompanyContactHelper::getCompanyContact();


        // Share data with all views
        view()->share([
            'loggedInUser' => $loggedInUser,
            'colorClasses' => $colorClasses, 
            'companyContact' => $companyContact, 
        ]);
    }
}
