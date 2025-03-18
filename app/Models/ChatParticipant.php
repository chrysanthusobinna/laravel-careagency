<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  

class ChatParticipant extends Model
{
    use HasFactory, SoftDeletes; 

    protected $fillable = ['chat_id', 'user_id', 'unseen_messages '];

    protected $dates = ['deleted_at']; 

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
