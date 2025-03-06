<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'care_beneficiary_id',
        'booked_by_id',
        'start_date',
        'end_date',
        'number_of_carers',
        'status'
    ];

    public function careBeneficiary()
    {
        return $this->belongsTo(User::class, 'care_beneficiary_id');
    }

    public function bookedBy()
    {
        return $this->belongsTo(User::class, 'booked_by_id');
    }

    public function assignedCarers()
    {
        return $this->hasMany(BookingCarerAssignment::class, 'booking_id');
    }

    // Accessor to format the status
    public function getFormattedStatusAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->status));
    }
}
