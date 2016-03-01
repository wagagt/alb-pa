<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Oficinas
 *
 * @author  The scaffold-interface created at 2016-03-01 07:10:33am
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Oficinas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('oficinas',function (Blueprint $table){

        $table->increments('id');
        
        $table->string('nombre');
        
        $table->string('direccion');
        
        $table->string('telefono');
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('paise_id')->unsigned();
        $table->foreign('paise_id')->references('id')->on('paises');

        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('oficinas');
     }
}
