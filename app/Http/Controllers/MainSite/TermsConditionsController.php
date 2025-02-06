<?php 

namespace App\Http\Controllers\MainSite;

use Illuminate\Http\Request;
use App\Traits\CompanyContactTrait;
use App\Http\Controllers\Controller;

class TermsConditionsController extends Controller
{
    use CompanyContactTrait;

    public function __construct()
    {
        $companyContact = $this->getCompanyContact();

        view()->share([
            'companyContact' => $companyContact

        ]);
    }

    // Show Terms and Conditions for Service Users
    public function serviceUserTerms()
    {
        return view('mainsite.pages.termsconditionserviceuser');
    }

    // Show Terms and Conditions for Carers
    public function carerTerms()
    {
        return view('mainsite.pages.termsconditioncarer');
    }
}
