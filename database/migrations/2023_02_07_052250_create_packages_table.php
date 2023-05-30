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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->string('slug')->unique();
            $table->string('country_to');
            $table->string('country_from');
            $table->string('insurance');
            $table->string('price');
            $table->string('validity');
            $table->string('category');
            $table->string('visa_type');
            $table->string('processing_time')->nullable();
            $table->string('entry_type')->nullable();
            $table->string('period');
            $table->string('category_id');
            $table->string('is_featured');
            $table->string('status');
            $table->string('meta_title');
            $table->string('meta_description');
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
        Schema::dropIfExists('packages');
    }
};
