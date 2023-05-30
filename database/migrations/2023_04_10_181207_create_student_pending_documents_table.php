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
        Schema::create('student_pending_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->string('pending_document')->nullable();
            $table->string('lead_status')->nullable();
            $table->string('comment')->nullable();
            $table->integer('created_by')->nullable();
            $table->string('created_by_name')->nullable();
            $table->timestamp('created_date')->nullable();
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
        Schema::dropIfExists('student_pending_documents');
    }
};
