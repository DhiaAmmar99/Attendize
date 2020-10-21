<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationShuttleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_shuttle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('registration_id')->unsigned();
            $table->foreign('registration_id')->references('id')->on('registrations')
                ->onDelete('cascade');
                $table->bigInteger('shuttle_id')->unsigned();
            $table->foreign('shuttle_id')->references('id')->on('shuttles')
                ->onDelete('cascade');
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
        Schema::dropIfExists('registration_shuttle');
    }
}
