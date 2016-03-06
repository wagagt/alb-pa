<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Oficinas
 *
 * @author  The scaffold-interface created at 2016-03-02 07:49:59pm
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
        $table->string('telefono');
        $table->string('direccion');
        $table->softDeletes();
        $table->timestamps();




        /**
         * Foreignkeys section
         */

        $table->integer('pais_id')->unsigned();
        $table->foreign('pais_id')->references('id')->on('paises');


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
