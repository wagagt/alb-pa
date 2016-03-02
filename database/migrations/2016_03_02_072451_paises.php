<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Paises
 *
 * @author  The scaffold-interface created at 2016-03-02 07:24:51pm
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
        
        $table->string('pais');
        
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
