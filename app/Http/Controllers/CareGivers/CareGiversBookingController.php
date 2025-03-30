<?php

namespace App\Http\Controllers\CareGivers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\BookingCarerAssignment;
use App\Traits\AuthUserViewSharedDataTrait;

class CareGiversBookingController extends Controller
{

        
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }

    
    // View bookings assigned to the logged-in caregiver
    public function index()
    {
        $bookings = BookingCarerAssignment::where('carer_id', Auth::id())
            ->where('service_user_response', 'accepted') // Ensure service user accepted
            ->with('booking.careBeneficiary') // Load related service user details
            ->orderBy('created_at', 'desc')
            ->get();

        return view('caregiver.pages.bookings', compact('bookings'));
    }

 

    // Show booking assigned to the caregiver
    public function show($id)
    {
        $assignment = BookingCarerAssignment::where('carer_id', Auth::id())
            ->where('booking_id', $id)
            ->with('booking.careBeneficiary')
            ->firstOrFail();

        return view('caregiver.pages.booking-show', compact('assignment'));
    }


    // Caregiver Accepts Booking
    public function acceptResponse($id)
    {
        $assignment = BookingCarerAssignment::where('id', $id)
            ->where('carer_id', Auth::id())
            ->firstOrFail();

        // Update caregiver's response to "accepted"
        $assignment->update(['caregiver_user_response' => 'accepted']);

        return redirect()->back()->with('success', 'You have accepted this booking.');
    }

    // Caregiver Cancels Response (Existing)
    public function cancelResponse($id)
    {
        $assignment = BookingCarerAssignment::where('id', $id)
            ->where('carer_id', Auth::id())
            ->firstOrFail();

        // Update caregiver's response to "cancelled"
        $assignment->update(['caregiver_user_response' => 'cancelled']);

        return redirect()->back()->with('success', 'Your response has been cancelled.');
    }
}
