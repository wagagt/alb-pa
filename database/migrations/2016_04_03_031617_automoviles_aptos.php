<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Automoviles_aptos
 *
 * @author  The scaffold-interface created at 2016-04-03 03:16:17am
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class AutomovilesAptos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('automoviles_aptos',function (Blueprint $table){

        $table->increments('id');
        $table->string('modelo');
        $table->string('placa');

        $table->timestamps();
        $table->softDeletes();


        /**
         * Foreignkeys section
         */

         $table->integer('apto_id')->unsigned();
         $table->foreign('apto_id')->references('id')->on('apartamentos');

         $table->integer('marca_id')->unsigned();
         $table->foreign('marca_id')->references('id')->on('marca_vehiculos');


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
        Schema::drop('automoviles_aptos');
     }
}
