<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareBookingRequestController extends Controller
{
    /**
     * Display the Care Booking Request page.
     */
    public function index()
    {
        return view('admin.pages.care-booking-request');
    }
}
