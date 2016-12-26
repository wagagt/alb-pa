<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasPorCobrar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_por_cobrar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 45);
            $table->text('descripcion', 400);
            $table->float('monto');
            $table->integer('mora');
            $table->dateTime('fecha_inicio_cobro');
            $table->dateTime('fecha_fin_cobro')->default('0000-00-00 00:00:00');
            $table->enum('recurrencia',['unico','semanal', 'mensual', 'trimestral']);
            $table->integer('dia_del_mes');
            $table->enum('status',['creada', 'generada', 'porcesada', 'inactiva']);

            $table->integer('torre_id')->unsigned();
            $table->foreign('torre_id')->references('id')->on('torres')->onDelete('cascade');

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
        Schema::drop('cuentas_por_cobrar');
    }
}
