<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    protected $fillable = ['family_member_id', 'care_beneficiary_id', 'relationship_type'];

    public function familyMember()
    {
        return $this->belongsTo(User::class, 'family_member_id');
    }

    public function careBeneficiary()
    {
        return $this->belongsTo(User::class, 'care_beneficiary_id');
    }
}
