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
        Schema::table('eligibility_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('submitted_by')->after('user_id');
            $table->foreign('submitted_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eligibility_requests', function (Blueprint $table) {
            $table->dropForeign(['submitted_by']);
            $table->dropColumn('submitted_by');
        });
    }
};
