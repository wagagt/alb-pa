<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Archivos_documentos
 *
 * @author  The scaffold-interface created at 2016-04-09 11:48:36pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class ArchivosDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('archivos_documentos',function (Blueprint $table){

        $table->increments('id');
        
        $table->string('nombre');
        
        $table->string('tipo');
        
        $table->boolean('activo');
        
        $table->integer('documentos_id');
        
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
        Schema::drop('archivos_documentos');
     }
}
