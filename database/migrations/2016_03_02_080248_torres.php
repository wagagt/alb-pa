<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Torres
 *
 * @author  The scaffold-interface created at 2016-03-02 08:02:48pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Torres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('torres',function (Blueprint $table){

        $table->increments('id');
        $table->string('nombre');
        $table->string('direccion');
        $table->string('niveles');
        $table->string('torre_numero');
        $table->softDeletes();
        $table->timestamps();


        /**
         * Foreignkeys section
         */

        $table->integer('oficina_id')->unsigned();
        $table->foreign('oficina_id')->references('id')->on('oficinas');


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
        Schema::drop('torres');
     }
}
