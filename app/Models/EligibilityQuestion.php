<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EligibilityQuestion extends Model
{
    use HasFactory, SoftDeletes;  

    protected $fillable = ['question', 'more_details', 'type', 'options', 'child_question', 'option_others', 'child_question_required'];


    protected $casts = [
        'options' => 'array',
    ];

    protected $dates = ['deleted_at'];  
}
