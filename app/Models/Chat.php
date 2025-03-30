<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Chat extends Model
{
    use HasFactory, SoftDeletes; 

    protected $fillable = ['title', 'created_at', 'updated_at'];

    protected $dates = ['deleted_at']; 

    public function users()
    {
        return $this->belongsToMany(User::class, 'chat_participants');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function chatParticipants()
    {
        return $this->hasMany(ChatParticipant::class);
    }
}
