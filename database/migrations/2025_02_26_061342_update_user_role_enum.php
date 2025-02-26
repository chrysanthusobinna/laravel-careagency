<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateUserRoleEnum extends Migration
{
    public function up()
    {
        DB::statement("
            ALTER TABLE users 
            MODIFY COLUMN role ENUM('admin_level_1','admin_level_2','care_giver','care_beneficiary','family_member') NOT NULL;
        ");
    }

    public function down()
    {
        DB::statement("
            ALTER TABLE users 
            MODIFY COLUMN role ENUM('admin_level_1','admin_level_2','care_giver','service_user','family_member') NOT NULL;
        ");
    }
}
