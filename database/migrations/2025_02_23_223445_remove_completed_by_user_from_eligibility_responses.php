<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCompletedByUserFromEligibilityResponses extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('eligibility_responses', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['completed_by_user']);
            
            // Now drop the 'completed_by_user' column
            $table->dropColumn('completed_by_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eligibility_responses', function (Blueprint $table) {
            // Recreate the 'completed_by_user' column
            $table->unsignedBigInteger('completed_by_user')->nullable();
            
            // Recreate the foreign key constraint
            $table->foreign('completed_by_user')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
