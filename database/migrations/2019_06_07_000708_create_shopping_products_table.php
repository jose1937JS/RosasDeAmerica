<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product');
            $table->string('quantity');
            $table->integer('price');
            $table->integer('status')->default(1);
            $table->unsignedInteger('shopping_id');
            $table->timestamps();

            $table->foreign('shopping_id')->references('id')->on('shopping');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_products');
    }
}
