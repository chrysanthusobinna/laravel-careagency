<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingCarerAssignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'carer_id',
        'service_user_response',  
        'caregiver_user_response', 
    ];
    

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function carer()
    {
        return $this->belongsTo(User::class);
    }
}
