<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EligibilityQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'type', 'options','child_question'];

    protected $casts = [
        'options' => 'array',
    ];
}
