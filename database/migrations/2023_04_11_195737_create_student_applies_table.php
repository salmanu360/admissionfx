<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_applies', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('recruiter_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('course_id');
            $table->integer('college_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_applies');
    }
};
