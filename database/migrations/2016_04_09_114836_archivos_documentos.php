<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArchivosDocumentos extends Migration
{
    public function up()
    {
        Schema::create('archivos_documentos',function (Blueprint $table){
        $table->increments('id');
        $table->string('nombre');
        $table->string('tipo');
        $table->boolean('activo');
        $table->integer('documentos_id');
        });
    }

    public function down()
    {
        Schema::drop('archivos_documentos');
     }
}
