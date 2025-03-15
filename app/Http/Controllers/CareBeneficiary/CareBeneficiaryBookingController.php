<?php

namespace App\Http\Controllers\CareBeneficiary;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\BookingCarerAssignment;
use Illuminate\Support\Facades\Validator;
use App\Traits\AuthUserViewSharedDataTrait;

class CareBeneficiaryBookingController extends Controller
{

    
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }
    

    // Show a list of all bookings for the logged-in service user
    public function index()
    {
        $bookings = Booking::where('care_beneficiary_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('carebeneficiary.pages.bookings', compact('bookings'));
    }

    // Show details of a specific booking
    public function show($bookingId)
    {
        $booking = Booking::where('care_beneficiary_id', Auth::id())
            ->where('id', $bookingId)
            ->firstOrFail();
    
        // Get carers assigned to this booking
        $assignedCarers = [];
        $approvedCarers = [];
    
        if ($booking->status === 'carers_assigned') {
            $assignedCarers = BookingCarerAssignment::where('booking_id', $booking->id)->get();
        }
    
        if ($booking->status === 'approved') {
            $approvedCarers = BookingCarerAssignment::where('booking_id', $booking->id)
                ->where('service_user_response', 'accepted')
                ->where('caregiver_user_response', 'accepted')
                ->get();
        }
    
        return view('carebeneficiary.pages.bookings-show', compact('booking', 'assignedCarers', 'approvedCarers'));
    }
    


    public function showCareGiver(Request $request, $id)
    {
        // Validate user ID to ensure it's a valid care giver
        $validator = Validator::make(
            ['id' => $id],  
            [
                'id' => [
                    'required',
                    'exists:users,id',
                    Rule::exists('users', 'id')->where(function ($query) {
                        return $query->where('role', 'care_giver');
                    }),
                ],
            ],
            [
                'id.exists' => 'The selected user is either invalid or not a care giver.',
            ]
        );
    
        // Handle validation failure
        if ($validator->fails()) {
            return redirect()->route('admin.caregivers.index')
                ->withErrors($validator)
                ->with('error', 'The selected user is either invalid or not a care giver.');
        }
    
        // Fetch the user if validation passes
        $user = User::findOrFail($id);
        return view('carebeneficiary.pages.view-caregiver', compact('user'));
    }
    
    
    public function selectCarers(Request $request, $bookingId)
    {
        $booking = Booking::where('care_beneficiary_id', Auth::id())
            ->where('id', $bookingId)
            ->firstOrFail();
    
        if ($booking->status !== 'carers_assigned') {
            return redirect()->back()->with('error', 'Carer selection is not available at this stage.');
        }
    
        // Get selected carer IDs
        $selectedCarers = $request->carer_ids ?? [];
        $selectedCarersCount = count($selectedCarers);
    
        // Update selected carers as accepted
        BookingCarerAssignment::where('booking_id', $booking->id)
            ->whereIn('carer_id', $selectedCarers)
            ->update(['service_user_response' => 'accepted']);
    
        // Update non-selected carers as pending
        BookingCarerAssignment::where('booking_id', $booking->id)
            ->whereNotIn('carer_id', $selectedCarers)
            ->update(['service_user_response' => 'pending', 'caregiver_user_response' => 'pending']);
    
        // Update booking status and selected carers count
        $booking->update([
            'status' => 'carers_selected',
            'number_of_carers' => $selectedCarersCount,  
        ]);
    
        return redirect()->route('carebeneficiary.bookings.show', $booking->id)
            ->with('success', 'Carers selected successfully. The new number of selected carers has been updated.');
    }
    
    
    
    // Create a booking form
    public function create()
    {
        $careBeneficiary = Auth::user(); // Get the authenticated user

        return view('carebeneficiary.pages.bookings-create', compact('careBeneficiary'));
    }


    // Store the booking request
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'number_of_carers' => 'required|integer|min:1',
        ]);

        // Generate a unique 6-digit  
        do {
            $referenceNumber = '#' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        } while (Booking::where('reference_number', $referenceNumber)->exists());

        Booking::create([
            'reference_number' => $referenceNumber,
            'care_beneficiary_id' => Auth::id(),
            'booked_by_id' => Auth::id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'number_of_carers' => $request->number_of_carers,
            'status' => 'pending',
        ]);

        return redirect()->route('carebeneficiary.bookings.index')->with('success', 'Booking submitted successfully.');
    }

}
