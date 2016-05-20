<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Parqueos
 *
 * @author  The scaffold-interface created at 2016-04-02 07:57:39pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Parqueos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('parqueos',function (Blueprint $table){

        $table->increments('id');
        $table->string('numero');
        $table->integer('apto_id')->unsigned();
        $table->boolean('asignado')->default(0);
        $table->timestamps();
        $table->softDeletes();
        $table->foreign('apto_id')->references('id')->on('apartamentos');
        });
    }

    public function down()
    {
        Schema::drop('parqueos');
     }
}
