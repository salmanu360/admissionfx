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
        Schema::create('recruiters', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('email');
            $table->string('website');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('student_source');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('postal_zip')->nullable();
            $table->string('phone', 255);
            $table->string('mobile', 255)->nullable();
            $table->string('skype')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('referred')->nullable();
            $table->date('recruiting_from_date')->nullable();
            $table->longText('services')->nullable();
            $table->string('students_from');
            $table->longText('institute')->nullable();
            $table->string('associations')->nullable();
            $table->string('recruiting_from_country')->nullable();
            $table->string('students_per_year')->nullable();
            $table->string('marketing');
            $table->string('service_fee')->nullable();
            $table->string('refer_student_bureau')->nullable();
            $table->string('comments')->nullable();
            $table->string('reference_name')->nullable();
            $table->string('reference_institution')->nullable();
            $table->string('reference_institution_email')->nullable();
            $table->string('reference_institution_contact')->nullable();
            $table->string('reference_institution_website')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('business_certificate')->nullable();
            $table->string('declare_confirm');
            $table->string('terms_conditions');
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
        Schema::dropIfExists('recruiters');
    }
};
