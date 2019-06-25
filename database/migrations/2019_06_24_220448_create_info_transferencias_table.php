<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoTransferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_transferencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banco');
            $table->string('nro_cuenta');
            $table->string('tipo_cuenta');
            $table->string('cedula');
            $table->string('titular');
            $table->string('correo');
            $table->string('telefono');
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
        Schema::dropIfExists('info_transferencias');
    }
}
