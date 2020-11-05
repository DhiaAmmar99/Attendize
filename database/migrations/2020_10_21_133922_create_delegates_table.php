<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelegatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delegates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('job_title');
            $table->string('organization');
            $table->string('email_address');
            $table->string('experience');
            $table->string('dietary');
            $table->string('language_translation');
            $table->string('languages');
            $table->string('first_check');
            $table->string('second_check');
            $table->string('guests');
            $table->string('lead');
            $table->unsignedBigInteger('register_id');
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
        Schema::dropIfExists('delegates');
    }
}
