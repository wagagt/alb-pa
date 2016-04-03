<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Marca_vehiculos
 *
 * @author  The scaffold-interface created at 2016-04-02 06:37:07pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class MarcaVehiculos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('marca_vehiculos',function (Blueprint $table){

        $table->increments('id');
        $table->string('marca');
        $table->softDeletes();
        $table->timestamps();

        /**
         * Foreignkeys section
         */

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
        Schema::drop('marca_vehiculos');
     }
}
