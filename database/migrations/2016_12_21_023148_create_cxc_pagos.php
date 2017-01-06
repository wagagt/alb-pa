<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCxcPagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cxc_pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->DateTime('fecha_pago');
            $table->float('monto');
            $table->string('no_comprobante');
            $table->enum('tipo_pago',['cheque', 'efectivo','transferencia', 'deposito']);
            $table->enum('status', ['pendiente', 'confirmado', 'invalido'])->default('pendiente');

            $table->integer('cxc_apto_id')->unsigned();
            $table->foreign('cxc_apto_id')->references('id')->on('cxc_aptos')->onDelete('cascade');
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
        Schema::drop('cxc_pagos');
    }
}
