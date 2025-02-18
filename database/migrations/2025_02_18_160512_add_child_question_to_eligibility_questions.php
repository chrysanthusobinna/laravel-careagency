<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('eligibility_questions', function (Blueprint $table) {
            $table->string('child_question')->nullable()->after('options');
        });
    }

    public function down()
    {
        Schema::table('eligibility_questions', function (Blueprint $table) {
            $table->dropColumn('child_question');
        });
    }
};
