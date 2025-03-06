<?php

namespace App\Http\Controllers\CareBeneficiary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\AuthUserViewSharedDataTrait;

class CareBeneficiaryChatController extends Controller
{
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }

    //Show the chat page.

    public function index()
    {
        return view('carebeneficiary.pages.chat');
    }
}
