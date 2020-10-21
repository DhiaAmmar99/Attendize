<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('registration_as');
            $table->text('membership_number');
            $table->string('membership');
            $table->datetime('first_name');
            $table->datetime('last_name');
            $table->string('job_title');
            $table->string('organization');
            $table->string('email_address');
            $table->string('country');
            $table->string('postal_address');
            $table->string('experience');
            $table->string('dietary');
            $table->string('language_translation');
            $table->string('languages');
            $table->string('first_check');
            $table->string('list_congress');
            $table->string('mode_payment');
            $table->string('payment_status');
            $table->string('second_check');
            $table->string('eventP');
            $table->string('eventS');
            $table->string('eventG');
            $table->string('eventW');
            $table->string('guests');
            $table->string('price');
            $table->string('lead');
            $table->string('password');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
