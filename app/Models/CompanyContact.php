<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_1',
        'email_2',
        'email_3',
        'email_4',
        'phone_1',
        'phone_2',
        'phone_3',
        'phone_4',
        'address_1',
        'address_2',
        'address_3',
        'address_4',
        'facebook',
        'instagram',
        'linkedin',
        'youtube',
    ];
}
