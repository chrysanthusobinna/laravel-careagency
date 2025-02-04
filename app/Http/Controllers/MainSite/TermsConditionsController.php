<?php

namespace App\Http\Controllers\MainSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsConditionsController extends Controller
{
  
    // Show Terms and Conditions for Service Users.
    
    public function serviceUserTerms()
    {
        return view('mainsite.pages.termsconditionserviceuser');
    }

 
     // Show Terms and Conditions for Carers.
   
    public function carerTerms()
    {
        return view('mainsite.pages.termsconditioncarer');
    }
}
