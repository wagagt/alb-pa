<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCxcAptos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cxc_aptos', function (Blueprint $table) {
            $table->increments('id');
            $table->float('monto_mora')->default(0.00);
            $table->DateTime('fecha_cobro');
            $table->DateTime('fecha_vence')->default('0000-00-00 00:00:00');
            $table->enum('status',['pendiente', 'incompleto','cancelado', 'mora'])->default('pendiente');

            $table->integer('cxc_id')->unsigned();
            $table->foreign('cxc_id')->references('id')->on('cxc')->onDelete('cascade');

            $table->integer('apto_id')->unsigned();
            $table->foreign('apto_id')->references('id')->on('apartamentos')->onDelete('cascade');
                        
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
        Schema::drop('cxc_aptos');
    }
}
