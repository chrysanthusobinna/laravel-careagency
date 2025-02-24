<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableUpdateRoleColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Update the 'role' column to include 'family_member'
            $table->enum('role', ['admin_level_1', 'admin_level_2', 'care_giver', 'service_user', 'family_member'])
                ->collation('utf8mb4_unicode_ci')
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Rollback the 'role' column to previous state
            $table->enum('role', ['admin_level_1', 'admin_level_2', 'care_giver', 'service_user'])
                ->collation('utf8mb4_unicode_ci')
                ->change();
        });
    }
}
