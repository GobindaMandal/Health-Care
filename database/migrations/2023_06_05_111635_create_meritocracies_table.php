<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeritocraciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meritocracies', function (Blueprint $table) {
            $table->increments("id"); 
            $table->string("class");
            $table->string("exam");
            $table->string("result");
            $table->string("certificate");
            $table->string("organization_certificate");
            $table->string("marksheet");
            $table->string("picture");
            $table->string("employee_details");
            $table->string("help_type");
            $table->string("amount");
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
        Schema::dropIfExists('meritocracies');
    }
}
