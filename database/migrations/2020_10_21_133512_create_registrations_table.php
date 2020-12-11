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
            $table->bigIncrements('id')->nullable()->change();
            $table->string('registration_as')->nullable()->change();
            $table->string('membership_number')->nullable()->change();
            $table->string('membership')->nullable()->change();
            $table->datetime('first_name')->nullable()->change();
            $table->datetime('last_name')->nullable()->change();
            $table->string('job_title')->nullable()->change();
            $table->string('organization')->nullable()->change();
            $table->string('email_address')->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->string('postal_address')->nullable()->change();
            $table->string('experience')->nullable()->change();
            $table->string('dietary')->nullable()->change();
            $table->string('language_translation')->nullable()->change();
            $table->string('languages')->nullable()->change();
            $table->string('first_check')->nullable()->change();
            $table->string('mode_payment')->nullable()->change();
            $table->string('payment_status')->nullable()->change();
            $table->string('second_check')->nullable()->change();
            $table->string('eventP')->nullable()->change();
            $table->string('eventS')->nullable()->change();
            $table->string('eventG')->nullable()->change();
            $table->string('eventW')->nullable()->change();
            $table->string('guests')->nullable()->change();
            $table->string('price')->nullable()->change();
            $table->string('lead')->nullable()->change();
            $table->string('password')->nullable()->change();
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
        Schema::dropIfExists('registrations');
    }
}
