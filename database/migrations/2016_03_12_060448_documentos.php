<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Documentos
 *
 * @author  The scaffold-interface created at 2016-03-12 06:04:48pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Documentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('documentos',function (Blueprint $table){

        $table->increments('id');
        $table->string('nombre');
        $table->integer('tipo_documentos_id');
        $table->date('fecha_del');
        $table->date('fecha_al');
        $table->integer('user_id');
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
        Schema::drop('documentos');
     }
}
