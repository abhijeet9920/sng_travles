<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmOutstationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('am_outstations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_fname', 50);
            $table->string('user_lname', 50);
            $table->string('user_email', 255);
            $table->string('user_mobile', 12);
            $table->dateTime('pickup_time');
            $table->dateTime('drop_time');
            $table->binary('pickup_location');
            $table->binary('drop_location');
            $table->tinyInteger('is_confirm', 0);
            $table->string('user_notes', 255);
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
        Schema::dropIfExists('am_outstations');
    }
}
