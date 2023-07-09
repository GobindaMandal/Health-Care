<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->string("name_designation")->nullable();
            $table->string("ERP_number")->nullable();
            $table->string("relation")->nullable();
            $table->string("applicant_reason")->nullable();
            $table->string("applicant_type")->nullable();
            $table->string("treatment_name")->nullable();
            $table->string("student_name")->nullable();
            $table->string("result")->nullable();
            $table->string("approved_amount")->nullable();
            $table->date("office_order_date")->nullable();
            $table->string("memorial_no")->nullable();
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
        Schema::dropIfExists('archives');
    }
}
