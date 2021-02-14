<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbstractsChair extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abstracts_chair', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('chair_id')->references('id')->on('chairs')->onDelete('cascade');
            $table->bigInteger('abstract_id')->unsigned();
            $table->foreign('abstract_id')->references('id')->on('abstracts')->onDelete('cascade');
            $table->bigInteger('chair_id')->unsigned();
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
        Schema::dropIfExists('abstracts_chair');
    }
}
