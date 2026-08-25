<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('SDN Tunggaljaya 2');
            $table->string('npsn')->nullable();
            $table->string('akreditasi')->default('B');
            $table->string('principal_name')->nullable();
            $table->text('principal_welcome')->nullable();
            $table->string('principal_photo')->nullable();
            $table->text('history')->nullable();
            $table->text('vision')->nullable();
            $table->json('mission')->nullable(); // array of mission strings
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('map_url')->nullable();
            $table->integer('student_count')->default(0);
            $table->integer('teacher_count')->default(0);
            $table->integer('class_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_profiles');
    }
};
