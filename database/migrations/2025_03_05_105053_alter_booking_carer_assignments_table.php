<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('booking_carer_assignments', function (Blueprint $table) {
            // Remove old columns
            $table->dropColumn('service_user_accepted');
            $table->dropColumn('caregiver_user_accepted');

            // Add new columns
            $table->enum('service_user_response', ['pending', 'accepted', 'cancelled'])
                  ->default('pending')
                  ->before('carer_id');
                  
            $table->enum('caregiver_user_response', ['pending', 'accepted', 'cancelled'])
                  ->default('pending')
                  ->before('carer_id');
        });
    }

    public function down()
    {
        Schema::table('booking_carer_assignments', function (Blueprint $table) {
            // Restore old columns
            $table->boolean('service_user_accepted')->default(false);
            $table->boolean('caregiver_user_accepted')->default(false);

            // Drop new columns
            $table->dropColumn('service_user_response');
            $table->dropColumn('caregiver_user_response');
        });
    }
};
