<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EligibilityResponse extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'question_id', 'answer','child_answer'];

    public function question()
    {
        return $this->belongsTo(EligibilityQuestion::class, 'question_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function beneficiary()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
   
}
