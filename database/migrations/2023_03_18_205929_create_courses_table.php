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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('college_id');
            $table->string('name');
            $table->string('slug');
            $table->string('intake');
            $table->longText('description')->nullable();
            $table->string('duration');
            $table->decimal('tuition_fee', 10, 2);
            $table->decimal('application_fee', 10, 2)->nullable();
            $table->longText('tags')->nullable();
            $table->longText('requirement');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
