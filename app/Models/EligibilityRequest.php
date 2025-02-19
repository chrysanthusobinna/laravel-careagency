<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EligibilityRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'submitted_by',
        'note',
        'eligibility_checked_by',
    ];

    // Relationship to the service user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function submittedBy()
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }

    // Relationship to the admin who checked the eligibility
    public function checkedBy()
    {
        return $this->belongsTo(User::class, 'eligibility_checked_by');
    }
}
