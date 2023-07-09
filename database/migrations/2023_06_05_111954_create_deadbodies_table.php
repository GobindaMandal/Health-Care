<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeadbodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deadbodies', function (Blueprint $table) {
            $table->increments("id"); 
            $table->date("death_date");
            $table->string("death_institute");
            $table->string("death_certificate");
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
        Schema::dropIfExists('deadbodies');
    }
}
