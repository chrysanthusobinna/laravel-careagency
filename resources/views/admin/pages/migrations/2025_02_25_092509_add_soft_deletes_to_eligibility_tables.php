<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('eligibility_responses', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('eligibility_requests', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('eligibility_responses', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('eligibility_requests', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
