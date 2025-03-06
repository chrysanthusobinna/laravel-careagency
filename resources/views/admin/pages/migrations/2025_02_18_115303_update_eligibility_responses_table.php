<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('eligibility_responses', function (Blueprint $table) {
            $table->foreignId('completed_by_user')
                  ->constrained('users')
                  ->cascadeOnDelete();

            // Replace question with question_id
            $table->dropColumn('question');
            $table->foreignId('question_id')
                  ->constrained('eligibility_questions')
                  ->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('eligibility_responses', function (Blueprint $table) {
            // Revert changes
            $table->dropForeign(['completed_by_user']);
            $table->dropColumn('completed_by_user');

            $table->dropForeign(['question_id']);
            $table->dropColumn('question_id');

            // Re-add the original question column
            $table->string('question');
        });
    }
};
