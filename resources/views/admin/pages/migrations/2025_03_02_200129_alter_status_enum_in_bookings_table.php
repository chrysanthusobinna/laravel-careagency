<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            DB::statement("ALTER TABLE bookings MODIFY COLUMN status ENUM('pending', 'carers_assigned', 'user_selected', 'approved', 'completed', 'rejected') NOT NULL DEFAULT 'pending'");
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            DB::statement("ALTER TABLE bookings MODIFY COLUMN status ENUM('pending', 'carers_assigned', 'user_selected', 'approved', 'rejected') NOT NULL DEFAULT 'pending'");
        });
    }
};
