<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove 'name' column
            $table->dropColumn('name');

            // Add new columns
            $table->enum('role', ['admin_level_1', 'admin_level_2', 'care_giver', 'service_user'])->after('id');
            $table->tinyInteger('status')->default(1)->after('role');
            $table->string('notice')->nullable()->after('status');
            $table->string('first_name')->after('notice');
            $table->string('middle_name')->nullable()->after('first_name');
            $table->string('last_name')->after('middle_name');
            $table->string('phone_number')->after('last_name');
            $table->string('address')->after('phone_number');
            $table->string('city')->after('address');
            $table->string('post_code')->after('city');
            $table->string('county')->after('post_code');
            $table->string('country')->after('county');
            $table->string('profile_picture')->nullable()->after('country');
            $table->string('activation_token')->nullable()->after('profile_picture');
            $table->boolean('two_factor_auth')->default(false)->after('activation_token');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Revert changes
            $table->string('name')->after('id');
            $table->dropColumn([
                'role',
                'status',
                'notice',
                'first_name',
                'middle_name',
                'last_name',
                'phone_number',
                'address',
                'city',
                'post_code',
                'county',
                'country',
                'profile_picture',
                'activation_token',
                'two_factor_auth'
            ]);
        });
    }
};
