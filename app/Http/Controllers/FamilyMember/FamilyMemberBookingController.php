<?php

namespace App\Http\Controllers\FamilyMember;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\BookingCarerAssignment;
use Illuminate\Support\Facades\Validator;
use App\Traits\AuthUserViewSharedDataTrait;

class FamilyMemberBookingController extends Controller
{

    
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }
    
    // Handle eligibility request for family member
    public function BookingFamilyList()
    {
        $user = Auth::user();
        $familyMembers = $user->managedCareBeneficiaries()->with('careBeneficiary')->get();

        return view('familymember.pages.bookings-family-list', compact('familyMembers'));
    }

        

    // Show a list of all bookings  
    public function index($userId)
    {
        $careBeneficiary = User::find($userId);
    
        if (!$careBeneficiary || $careBeneficiary->role !== 'care_beneficiary') {
            return redirect()->route('carebeneficiary.list')->with('error', 'Invalid user or not a care beneficiary.');
        }
    
        $bookings = Booking::where('care_beneficiary_id', $userId)->get();
    
        return view('familymember.pages.bookings', compact('bookings', 'careBeneficiary'));
    }
    
    
    

    // Show details of a specific booking
    public function show(Request $request, $userId, $bookingId)
    {
        $careBeneficiary = User::find($userId);
    
        if (!$careBeneficiary || $careBeneficiary->role !== 'care_beneficiary') {
            return redirect()->route('carebeneficiary.list')->with('error', 'Invalid user or not a care beneficiary.');
        }
    
        $booking = Booking::where('care_beneficiary_id', $userId)
            ->where('id', $bookingId)
            ->firstOrFail();
    
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
    
        // Pass the care beneficiary and other data to the view
        return view('familymember.pages.bookings-show', compact('booking', 'assignedCarers', 'approvedCarers', 'careBeneficiary'));
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
        return view('familymember.pages.view-caregiver', compact('user'));
    }
    
    
    public function selectCarers(Request $request, $userId, $bookingId)
    {
        // Fetch the care beneficiary by userId
        $careBeneficiary = User::find($userId);
    
        // Check if the care beneficiary exists and has the 'care_beneficiary' role
        if (!$careBeneficiary || $careBeneficiary->role !== 'care_beneficiary') {
            return redirect()->route('carebeneficiary.list')->with('error', 'Invalid user or not a care beneficiary.');
        }
    
        // Ensure the booking belongs to the care beneficiary
        $booking = Booking::where('care_beneficiary_id', $userId)
            ->where('id', $bookingId)
            ->firstOrFail();
    
        // Check if the booking is in the correct stage for carer selection
        if ($booking->status !== 'carers_assigned') {
            return redirect()->back()->with('error', 'Carer selection is not available at this stage.');
        }
    
        // Get selected carer IDs from the request
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
    
        // Update the booking status and the number of selected carers
        $booking->update([
            'status' => 'carers_selected',
            'number_of_carers' => $selectedCarersCount,
        ]);
    
        // Redirect to the booking show page with the correct parameters
        return redirect()->route('familymember.bookings.care-beneficiary.show', ['userId' => $userId, 'id' => $booking->id])
            ->with('success', 'Carers selected successfully. The new number of selected carers has been updated.');
    }
    
    
    
    public function create($userId)
    {
        $careBeneficiary = User::find($userId);
    
        if (!$careBeneficiary || $careBeneficiary->role !== 'care_beneficiary') {
            return redirect()->route('carebeneficiary.list')->with('error', 'Invalid user or not a care beneficiary.');
        }
    
        return view('familymember.pages.bookings-create', compact('careBeneficiary'));
    }
    

    // Store the booking request
    public function store(Request $request, $userId)
    {
        $careBeneficiary = User::find($userId);
    
        if (!$careBeneficiary || $careBeneficiary->role !== 'care_beneficiary') {
            return redirect()->route('carebeneficiary.list')->with('error', 'Invalid user or not a care beneficiary.');
        }
    
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'number_of_carers' => 'required|integer|min:1',
        ]);
    
        // Generate a unique 6-digit reference number
        do {
            $referenceNumber = '#' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        } while (Booking::where('reference_number', $referenceNumber)->exists());
    
        Booking::create([
            'reference_number' => $referenceNumber,
            'care_beneficiary_id' => $careBeneficiary->id, // Using the valid care beneficiary ID
            'booked_by_id' => Auth::id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'number_of_carers' => $request->number_of_carers,
            'status' => 'pending',
        ]);
    
        return redirect()->route('familymember.bookings.care-beneficiary.index', ['userId' => $careBeneficiary->id])
                         ->with('success', 'Booking submitted successfully.');
    }
    

}
