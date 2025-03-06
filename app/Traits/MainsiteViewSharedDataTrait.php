<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Helpers\CompanyContactHelper;

trait MainsiteViewSharedDataTrait
{
    public function shareViewData()
    {
        // Get the logged-in user
        $loggedInUser = Auth::user();

        if ($loggedInUser) {
            // Determine the dashboard route based on role
            if (in_array($loggedInUser->role, ['admin_level_1', 'admin_level_2'])) {
                $dashboardRoute = route('admin.dashboard');
            } elseif (in_array($loggedInUser->role, ['care_beneficiary', 'family_member'])) {
                $dashboardRoute = route('carebeneficiary.dashboard');
            } elseif ($loggedInUser->role === 'care_giver') {
                $dashboardRoute = route('caregiver.dashboard');
            } else {
                $dashboardRoute = route('mainsite.home'); // Default route if no role matches
            }

            // Add dashboard route property to loggedInUser object
            $loggedInUser->dashboard_route = $dashboardRoute;
        }

        // Company Contact
        $companyContact = CompanyContactHelper::getCompanyContact();

        // Share data with all views
        view()->share([
            'loggedInUser' => $loggedInUser,
            'companyContact' => $companyContact,
        ]);
    }
}
