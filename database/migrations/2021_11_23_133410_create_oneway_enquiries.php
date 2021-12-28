<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnewayEnquiries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('am_oneway_enquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('oneway_id');
            $table->string('user_fname', 50);
            $table->string('user_lname', 50);
            $table->string('user_email', 255);
            $table->string('user_mobile', 12);
            $table->dateTime('ride_time');
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
        Schema::dropIfExists('am_oneway_enquiries');
    }
}
