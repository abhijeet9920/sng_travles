<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOneway extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('am_oneway_routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 25);
            $table->string('description', 500);
            $table->string('start_location');
            $table->string('start_latlong');
            $table->string('end_location');
            $table->string('end_latlong');
            $table->string('distance')->comment('in meter');
            $table->integer('vehicle');
            $table->integer('rate');
            $table->string('running_schedule');
            $table->tinyInteger('is_active');
            $table->binary('additional_info');
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
        Schema::dropIfExists('am_oneway_routes');
    }
}
