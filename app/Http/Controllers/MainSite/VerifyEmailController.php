<?php

namespace App\Http\Controllers\MainSite;

use Illuminate\Http\Request;
use App\Traits\CompanyContactTrait;
use App\Http\Controllers\Controller;

class VerifyEmailController extends Controller
{
    use CompanyContactTrait;

    public function __construct()
    {
        $companyContact = $this->getCompanyContact();

        view()->share([
            'companyContact' => $companyContact

        ]);
    }

    public function showVerifyEmailForm()
    {
        return view('mainsite.pages.verify-email');
    }
}
