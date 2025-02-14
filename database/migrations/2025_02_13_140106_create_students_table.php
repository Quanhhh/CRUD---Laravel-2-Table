<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->integerIncrements('StudentID');
            $table->string('StudentName');
            $table->string('StudentEmail');
            $table->tinyInteger('StudentGender')->comment('0: Nam, 1: Nữ');
            $table->unsignedInteger('ClassRoomID');
            $table->foreign('ClassRoomID')->references('ClassRoomID')->on('Classrooms')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
