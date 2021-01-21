<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_schedule', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('registration_id')->unsigned();
            $table->foreign('registration_id')->references('id')->on('registrations')->onDelete('cascade');
            $table->bigInteger('session_id')->unsigned();
            $table->foreign('session_id')->references('id')->on('event')->onDelete('cascade');
            $table->int('status');
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
        Schema::dropIfExists('registration_schedule');
    }
}
