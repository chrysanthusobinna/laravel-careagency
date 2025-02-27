<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EligibilityResponse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'question_id', 'answer', 'child_answer'];

    protected $dates = ['deleted_at'];

    public function question()
    {
        return $this->belongsTo(EligibilityQuestion::class, 'question_id')->withTrashed();
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
