<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Apartamentos
 *
 * @author  The scaffold-interface created at 2016-03-02 08:11:48pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Apartamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('apartamentos',function (Blueprint $table){

        $table->increments('id');
        $table->string('numero');
        $table->string('nivel');
        $table->integer('cantidad_banios');
        $table->string('metros_cuadrados');
        $table->string('ambientes');
        $table->string('dormitorios');
        $table->string('marca_v_1');
        $table->integer('modelo_v_1');
        $table->string('placa_v_1');
        $table->string('marca_v_2');
        $table->integer('modelo_v_2');
        $table->string('placa_v_2');
        /**
         * Foreignkeys section
         */

        $table->integer('torre_id')->unsigned();
        $table->foreign('torre_id')->references('id')->on('torres');

        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users');


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
        Schema::drop('apartamentos');
     }
}
