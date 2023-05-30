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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('first_language');
            $table->string('country_citizenship');
            $table->string('passport_number');
            $table->date('passport_expiry_date');
            $table->string('marital_status');
            $table->string('gender');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('postal_zip');
            $table->string('email');
            $table->string('contact_no');
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relation')->nullable();
            $table->string('emergency_contact_email')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('country_edu');
            $table->string('high_level_edu');
            $table->string('grading_scheme');
            $table->string('country_institute');
            $table->string('institute_name');
            $table->string('level_education');
            $table->string('lan_institute');
            $table->date('institute_from');
            $table->date('institute_to');
            $table->string('degree_name');
            $table->date('graduation_date');
            $table->string('institute_confirmation');
            $table->string('physical_certificate');
            $table->string('visa_country_refusal')->nullable();
            $table->string('visa_country_refusal_detail')->nullable();
            $table->string('passport')->nullable();
            $table->string('ielts')->nullable();
            $table->string('grade_10')->nullable();
            $table->string('grade_12')->nullable();
            $table->string('bachelor_mark_sheet')->nullable();
            $table->string('bachelor_certificate')->nullable();
            $table->string('master_mark_sheet')->nullable();
            $table->string('master_certificate')->nullable();
            $table->string('lors')->nullable();
            $table->string('resume')->nullable();
            $table->string('work_experience')->nullable();
            $table->string('moi')->nullable();
            $table->string('personal_statement')->nullable();
            $table->string('diploma_mark_sheet')->nullable();
            $table->string('diploma_certificate')->nullable();
            $table->string('other_certificate')->nullable();
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
        Schema::dropIfExists('students');
    }
};
