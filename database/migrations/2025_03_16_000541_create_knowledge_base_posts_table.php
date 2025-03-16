<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('knowledge_base_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');  
            $table->text('content'); 
            
            // Enum field for category
            $table->enum('category', ['admin', 'care_giver', 'care_beneficiary', 'family_member']);
            
            $table->foreignId('author_user_id')->constrained('users')->onDelete('cascade'); 
            
            // Other fields
            $table->boolean('is_published')->default(true); 
            $table->timestamp('published_at')->nullable();  
            $table->string('media_attachment')->nullable(); 
            $table->string('media_file_type')->nullable();  
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledge_base_posts');
    }
};
