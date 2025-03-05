<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eligibility_questions', function (Blueprint $table) {
            $table->boolean('option_others')->default(0)->after('options');
            $table->boolean('child_question_required')->default(1)->after('child_question');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eligibility_questions', function (Blueprint $table) {
            $table->dropColumn(['option_others', 'child_question_required']);
        });
    }
};
