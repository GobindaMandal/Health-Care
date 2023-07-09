<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application__forms', function (Blueprint $table) {
            $table->id();
            $table->date("applicant_date");
            $table->string("fiscal_year");
            $table->string("office_name");
            $table->string("employee_name");
            $table->string("ERP_number");
            $table->string("nid");
            $table->string("designation");
            $table->date("joining_date");
            $table->string("grade");
            $table->string("number");
            $table->string("email");
            $table->string("bubo");
            $table->string("applicant_reason");
            $table->string("relation_name");
            $table->string("employee_sign")->nullable();
            $table->date("employee_date")->nullable();
            $table->string("controller_officer_name")->nullable();
            $table->string("controller_officer_designation")->nullable();
            $table->date("controller_officer_date")->nullable();
            $table->string("doctor_name")->nullable();
            $table->string("doctor_designation")->nullable();
            $table->date("doctor_date")->nullable();
            $table->string('status')->default("draft");
            $table->string("rejected_reason")->nullable();
            $table->string("claim_amount")->nullable();
            $table->string("total_amount")->nullable();
            $table->string("allowed_amount")->nullable();
            $table->string("approved_amount")->nullable();
            $table->date("meeting_date")->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('frontusers')->onDelete('cascade');
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
        Schema::dropIfExists('application__forms');
    }
}
