<?php

namespace App\Http\Controllers\MainSite;

use App\Traits\CompanyContactTrait;
use App\Http\Controllers\Controller;

class FamilyController extends Controller
{
    use CompanyContactTrait;

    public function __construct()
    {
        $companyContact = $this->getCompanyContact();

        view()->share([
            'companyContact' => $companyContact

        ]);
    }
    
    public function index()
    {
        return view('mainsite.pages.family');
    }
}
