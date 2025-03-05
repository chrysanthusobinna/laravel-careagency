<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('eligibility_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('question');
            $table->text('answer');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eligibility_responses');
    }
};
