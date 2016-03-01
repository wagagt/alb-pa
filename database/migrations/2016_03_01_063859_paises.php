<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Paises
 *
 * @author  The scaffold-interface created at 2016-03-01 06:38:59am
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Paises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('paises',function (Blueprint $table){

        $table->increments('id');
        
        $table->string('nombre');
        
        $table->string('ciudad');
        
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
        Schema::drop('paises');
     }
}
