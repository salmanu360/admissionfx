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
        Schema::disableForeignKeyConstraints();
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->string('name',255);
            $table->string('slug', 255);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('country_id')->references('id')
                ->on('countries')->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
};
