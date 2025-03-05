<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('care_beneficiary_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('booked_by_id')->constrained('users')->onDelete('cascade'); 
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('number_of_carers');
            $table->enum('status', ['pending', 'carers_assigned', 'user_selected', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
