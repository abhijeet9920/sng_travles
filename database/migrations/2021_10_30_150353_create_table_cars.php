<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('am_cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model');
            $table->string('fuel', 10);
            $table->string('vehicle_type', 15);
            $table->string('seater_type');
            $table->string('images');
            $table->tinyInteger('is_carrier_attached');
            $table->integer('rate');
            $table->tinyInteger('is_active');
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
        Schema::dropIfExists('am_cars');
    }
}
