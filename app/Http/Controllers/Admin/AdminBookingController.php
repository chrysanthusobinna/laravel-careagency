<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\BookingCarerAssignment;
use App\Traits\AuthUserViewSharedDataTrait;

class AdminBookingController extends Controller
{

    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }
    // View all bookings
    public function index()
    {
        $bookings = Booking::with('careBeneficiary', 'bookedBy')->orderBy('created_at', 'desc')->get();
        return view('admin.pages.bookings', compact('bookings'));
    }


    // Create a booking form
    public function create($userId)
    {
        // Retrieve the care beneficiary based on the user ID and role
        $careBeneficiary = User::where('role', 'care_beneficiary')->where('id', $userId)->firstOrFail();
    
        // Pass the care beneficiary to the view
        return view('admin.pages.bookings-create', compact('careBeneficiary'));
    }
    

    public function store(Request $request, $userId)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'number_of_carers' => 'required|integer|min:1',
        ]);
    
        // Validate that the user ID exists and is a care beneficiary
        $careBeneficiary = User::where('id', $userId)->where('role', 'care_beneficiary')->first();
    
        if (!$careBeneficiary) {
            return redirect()->route('admin.bookings.index')->with('error', 'Error: Could not find the care beneficiary.');
        }
    
        // Generate a unique 6-digit reference number
        do {
            $referenceNumber = '#' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        } while (Booking::where('reference_number', $referenceNumber)->exists());
    
        // Store booking
        Booking::create([
            'reference_number' => $referenceNumber,
            'care_beneficiary_id' => $careBeneficiary->id,
            'booked_by_id' => Auth::id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'number_of_carers' => $request->number_of_carers,
            'status' => 'pending',
        ]);
    
        return redirect()->route('admin.bookings.index')->with('success', 'Booking submitted successfully.');
    }
    

    // Show booking details
    public function show($bookingId)
    {
        $booking = Booking::with('careBeneficiary')->findOrFail($bookingId);
        
        // Get assigned carers
        $assignedCarers = BookingCarerAssignment::where('booking_id', $booking->id)->get();
        
        // Get accepted carers  
        $acceptedCarers = BookingCarerAssignment::where('booking_id', $booking->id)
        ->where('service_user_response', 'accepted')
        ->where('caregiver_user_response', 'accepted')
        ->get();

        
        
        return view('admin.pages.bookings-show', compact('booking', 'assignedCarers', 'acceptedCarers'));
    }


    // Approve the booking if the selected carers match the required number
    public function approve($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
    
        $acceptedCarersCount = BookingCarerAssignment::where('booking_id', $booking->id)
            ->where('service_user_response', 'accepted')
            ->where('caregiver_user_response', 'accepted')
            ->count();
    
        if ($acceptedCarersCount < $booking->number_of_carers) {
            return redirect()->back()->with('error', 'Not enough carers have been accepted yet.');
        }
    
        if ($acceptedCarersCount > $booking->number_of_carers) {
            return redirect()->back()->with('error', 'More carers have been accepted than required. Please review the selection.');
        }
    
        // Approve the booking if the number of accepted carers matches exactly
        $booking->update(['status' => 'approved']);
    
        return redirect()->route('admin.bookings.show', $booking->id)
            ->with('success', 'Booking approved successfully.');
    }
    


    // View a single booking and assign carers
    public function assignCarers($bookingId)
    {
        $booking = Booking::with('assignedCarers')->findOrFail($bookingId);
        $carers = User::where('role', 'care_giver')->get();
        return view('admin.pages.bookings-assign', compact('booking', 'carers'));
    }

    // Store assigned carers
    public function storeAssignedCarers(Request $request, $bookingId)
    {
        $booking = Booking::findOrFail($bookingId);

        // Remove all previously assigned carers
        BookingCarerAssignment::where('booking_id', $booking->id)->delete();

        // Assign new carers
        foreach ($request->carer_ids ?? [] as $carer_id) {
            BookingCarerAssignment::create([
                'booking_id' => $booking->id,
                'carer_id' => $carer_id
            ]);
        }

        // Update booking status
        $booking->update(['status' => 'carers_assigned']);

        // Redirect to the show booking page instead of index
        return redirect()->route('admin.bookings.show', $booking->id)
            ->with('success', 'Carers assigned successfully.');
    }

    
    public function removeAssignedCarer($bookingId, $id)
    {
        // Find and delete the assigned carer entry
        BookingCarerAssignment::where('booking_id', $bookingId)->where('id', $id)->delete();
    
        return redirect()->route('admin.bookings.show', $bookingId)->with('success', 'Carer removed from booking successfully.');
    }

    
    // Admin approves selection
    public function approveBooking($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $booking->update(['status' => 'approved']);
        return redirect()->route('admin.bookings.show', $booking->id)->with('success', 'Booking approved.');
    }

    public function edit($id)
    {
        // Retrieve the booking and ensure it exists
        $booking = Booking::findOrFail($id);
    
        // Retrieve the care beneficiary details
        $careBeneficiary = User::findOrFail($booking->care_beneficiary_id);
    
        return view('admin.pages.bookings-edit', compact('booking', 'careBeneficiary'));
    }
    
    public function update(Request $request, $id)
    {
        // Validate the request inputs
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'number_of_carers' => 'required|integer|min:1',
        ]);
    
        // Retrieve the booking
        $booking = Booking::findOrFail($id);
    
        // Update booking details
        $booking->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'number_of_carers' => $request->number_of_carers,
        ]);
    
        return redirect()->route('admin.bookings.show', $booking->id)->with('success', 'Booking updated successfully.');
    }
    


    public function updateAssignedCarer(Request $request, $id)
    {
        $request->validate([
            'service_user_response' => 'required|in:pending,accepted,cancelled',
            'caregiver_user_response' => 'required|in:pending,accepted,cancelled',
        ]);
    
        $assignment = BookingCarerAssignment::findOrFail($id);
    
        $assignment->update([
            'service_user_response' => $request->service_user_response,
            'caregiver_user_response' => $request->caregiver_user_response,
        ]);
    
        return redirect()->route('admin.bookings.show', $assignment->booking_id)
            ->with('success', 'Carer assignment updated successfully.');
    }
    
    


    public function cancelBooking($id)
    {
        // Retrieve the booking
        $booking = Booking::findOrFail($id);
    
        // // Remove all assigned carers for this booking
        // BookingCarerAssignment::where('booking_id', $booking->id)->delete();
    
        // Update booking status to "cancelled"
        $booking->update(['status' => 'cancelled']);
    
        return redirect()->route('admin.bookings.show', $booking->id)->with('success', 'Booking has been cancelled and all assigned carers have been removed.');
    }
    



}
