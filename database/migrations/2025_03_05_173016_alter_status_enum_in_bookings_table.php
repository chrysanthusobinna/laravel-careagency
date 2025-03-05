<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Modify the ENUM field by altering the table
        DB::statement("ALTER TABLE bookings MODIFY COLUMN status ENUM('pending', 'carers_assigned', 'carers_selected', 'approved', 'completed', 'cancelled') NOT NULL DEFAULT 'pending'");
    }

    public function down()
    {
        // Rollback to previous ENUM values
        DB::statement("ALTER TABLE bookings MODIFY COLUMN status ENUM('pending', 'carers_assigned', 'carers_selected', 'approved', 'completed', 'rejected') NOT NULL DEFAULT 'pending'");
    }
};
