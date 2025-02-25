<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class FamilyMember extends Model
{
    use HasFactory, SoftDeletes; 
    protected $fillable = ['family_member_id', 'care_beneficiary_id', 'relationship_type'];

    protected $dates = ['deleted_at']; 

    public function familyMember()
    {
        return $this->belongsTo(User::class, 'family_member_id');
    }

    public function careBeneficiary()
    {
        return $this->belongsTo(User::class, 'care_beneficiary_id');
    }
}
