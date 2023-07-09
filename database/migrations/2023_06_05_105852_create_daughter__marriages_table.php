<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaughterMarriagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daughter__marriages', function (Blueprint $table) {
            $table->increments("id");
            $table->date("marriage_date");
            $table->string("kabinnama");
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
        Schema::dropIfExists('daughter__marriages');
    }
}
