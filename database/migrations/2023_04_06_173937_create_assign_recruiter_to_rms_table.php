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
        Schema::create('assign_recruiter_to_rms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recruiter_id');
            $table->string('recruiter_name');
            $table->integer('rm_id');
            $table->string('rm_name');
            $table->integer('created_by')->nullable();
            $table->string('created_by_name')->nullable();
            $table->timestamps();
            $table->foreign('recruiter_id')->references('id')->on('recruiters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_recruiter_to_rms');
    }
};
