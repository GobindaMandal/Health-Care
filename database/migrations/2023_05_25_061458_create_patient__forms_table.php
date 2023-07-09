<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient__forms', function (Blueprint $table) {
            $table->increments("id");
            $table->string("patient_name");
            $table->string("patient_nid");
            $table->string("patient_pic");
            $table->string("treatment_type");
            $table->string("child_birth")->nullable();
            $table->string("maternity_leave")->nullable();
            $table->string("disease_name")->nullable();
            $table->string("hospital_name")->nullable();
            $table->date("clearance_date")->nullable();
            $table->string("clearance_hospital_name")->nullable();
            $table->string("clearance")->nullable();
            $table->string("doctor_recommendation")->nullable();
            $table->string("PRL")->nullable();
            $table->string("bd_office_order")->nullable();
            $table->date("child_birthdate")->nullable();
            $table->string("headofc_affidavit")->nullable();
            $table->string("accident_name")->nullable();
            $table->date("accident_date")->nullable();
            $table->string("accident_place")->nullable();
            $table->string("inquiry")->nullable();
            $table->unsignedBigInteger('application_id');
            $table->foreign('application_id')->references('id')->on('application__forms')->onDelete('cascade');
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
        Schema::dropIfExists('patient__forms');
    }
}
