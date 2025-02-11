<?php 

namespace App\Http\Controllers\MainSite;
use App\Http\Controllers\Controller;
use App\Traits\MainsiteViewSharedDataTrait;

class TermsConditionsController extends Controller
{
    use MainsiteViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
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
