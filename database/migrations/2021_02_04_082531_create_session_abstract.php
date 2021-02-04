<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionAbstract extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_abstract', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('session_id')->references('id')->on('sessions')
            ->onDelete('cascade');
            $table->bigInteger('abstract_id')->unsigned();
        $table->foreign('abstract_id')->references('id')->on('abstract')
            ->onDelete('cascade');
            $table->bigInteger('session_id')->unsigned();
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
        Schema::dropIfExists('session_abstract');
    }
}
