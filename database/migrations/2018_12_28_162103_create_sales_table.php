<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('people_id');
            $table->decimal('amount');
            $table->string('pay_method', 32);
            $table->string('state', 16);
            $table->string('address_one', 255);
            $table->string('address_two', 255)->nullable();
            $table->string('customer_email', 32)->nullable();
            $table->string('customer_phone', 15)->nullable();
            $table->string('nro_referencia', 15)->nullable();
            $table->timestamps();

            $table->foreign('people_id')->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
