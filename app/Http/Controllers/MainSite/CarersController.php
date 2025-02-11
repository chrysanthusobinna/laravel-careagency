<?php

namespace App\Http\Controllers\MainSite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\MainsiteViewSharedDataTrait;

class CarersController extends Controller
{
    use MainsiteViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }

    public function index()
    {        
        return view('mainsite.pages.carers');
    }

    //Show the carers registration page.
    public function showRegisterForm()
    {
        return view('mainsite.pages.carers-registration');
    }

 
    //Handle carer registration submission.
    public function submitCarerRegister(Request $request)
    {
        // Validate the form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
        ]);

        return back()->with('success', 'Thank you for your interest in CarePass! We will get back to you as soon as possible.');
    }
}
