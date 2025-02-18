<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'role',
        'status',
        'notice',
        'first_name',
        'middle_name',
        'last_name',
        'phone_number',
        'address',
        'city',
        'post_code',
        'county',
        'country',
        'profile_picture',
        'activation_token',
        'two_factor_auth',
        'email',
        'email_verified_at',
        'password',
        'password_change_required',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'activation_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_auth' => 'boolean',
    ];



    public function managedCareBeneficiaries()
    {
        // This user manages these care beneficiaries
        return $this->hasMany(FamilyMember::class, 'family_member_id');
    }

    public function familyMembersManagingThisUser()
    {
        // This user is the care beneficiary
        return $this->hasMany(FamilyMember::class, 'care_beneficiary_id');
    }

    public function eligibilityResponses()
    {
        return $this->hasMany(EligibilityResponse::class, 'user_id');
    }

    // service user eligbility
    public function eligibility()
    {
        return $this->hasOne(ServiceUserEligibility::class, 'user_id');
    }

    
}
