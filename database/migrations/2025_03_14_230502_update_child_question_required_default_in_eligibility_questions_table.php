<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateChildQuestionRequiredDefaultInEligibilityQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eligibility_questions', function (Blueprint $table) {
            $table->boolean('child_question_required')->default(0)->change();
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
            $table->boolean('child_question_required')->default(1)->change();
        });
    }
}
