<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletesToEligibilityQuestions extends Migration
{
    public function up()
    {
        Schema::table('eligibility_questions', function (Blueprint $table) {
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::table('eligibility_questions', function (Blueprint $table) {
            $table->dropSoftDeletes();  
        });
    }
}
