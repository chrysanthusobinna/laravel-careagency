<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('booking_carer_assignments', function (Blueprint $table) {
            $table->boolean('caregiver_user_accepted')->default(0)->after('admin_accepted');
        });
    }

    public function down()
    {
        Schema::table('booking_carer_assignments', function (Blueprint $table) {
            $table->dropColumn('caregiver_user_accepted');
        });
    }
};
