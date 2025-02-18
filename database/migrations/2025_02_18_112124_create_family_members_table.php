<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_member_id')->constrained('users')->onDelete('cascade'); // User managing the care
            $table->foreignId('care_beneficiary_id')->constrained('users')->onDelete('cascade'); // User receiving care
            $table->string('relationship_type')->comment('e.g., Father, Daughter, Sister');
            $table->timestamps();

            $table->unique(['family_member_id', 'care_beneficiary_id']); // Prevent duplicate records
        });
    }

    public function down()
    {
        Schema::dropIfExists('family_members');
    }
};
