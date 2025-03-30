<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowledgeBasePost extends Model
{
    use HasFactory;

    // Define the fillable fields for the KnowledgeBasePost model
    protected $fillable = [
        'title', 
        'content', 
        'category', 
        'author_user_id', 
        'is_published', 
        'published_at', 
        'media_attachment', 
        'media_file_type',
    ];

    // Define the relationship with the User model (author of the post)
    public function author()
    {
        return $this->belongsTo(User::class, 'author_user_id');
    }

    // Optionally, you can define an accessor to get the formatted category
    public function getCategoryFormattedAttribute()
    {
        return ucfirst(str_replace('_', ' ', $this->category)); // Capitalize and replace underscores with spaces
    }


}