<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('eligibility_responses', function (Blueprint $table) {
            $table->text('answer')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('eligibility_responses', function (Blueprint $table) {
            $table->text('answer')->nullable(false)->change();
        });
    }
};
