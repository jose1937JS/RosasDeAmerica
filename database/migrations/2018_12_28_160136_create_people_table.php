<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pin', 10);
            $table->string('first_name', 64);
            $table->string('last_name', 64);
            $table->string('email', 64);
            $table->string('phone', 15)->nullable();
            $table->string('address', 128);
            // $table->unsignedInteger('state_id');
            // $table->unsignedInteger('city_id');
            $table->timestamps();

            // $table->foreign('state_id')->references('id')->on('states');
            // $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
