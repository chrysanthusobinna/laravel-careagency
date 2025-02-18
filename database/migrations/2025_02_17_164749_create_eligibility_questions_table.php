<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('eligibility_questions', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->string('type'); // text, radio, checkbox
            $table->json('options')->nullable(); // Store possible options in JSON format for radio/checkbox
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eligibility_questions');
    }
};
