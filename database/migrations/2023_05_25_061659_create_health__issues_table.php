<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health__issues', function (Blueprint $table) {
            $table->increments("id");
            $table->string("sl_no");
            $table->string("voucher_no");
            $table->date("date");
            $table->float("amount");
            $table->string("file");
            $table->string("status");
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
        Schema::dropIfExists('health__issues');
    }
}
