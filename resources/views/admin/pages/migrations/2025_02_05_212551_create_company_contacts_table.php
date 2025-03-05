<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_contacts', function (Blueprint $table) {
            $table->id();
            
            // Email fields
            $table->string('email_1')->nullable();
            $table->string('email_2')->nullable();
            $table->string('email_3')->nullable();
            $table->string('email_4')->nullable();

            // Phone fields
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('phone_3')->nullable();
            $table->string('phone_4')->nullable();

            // Address fields
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->string('address_4')->nullable();

            // Social media fields
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_contacts');
    }
};
