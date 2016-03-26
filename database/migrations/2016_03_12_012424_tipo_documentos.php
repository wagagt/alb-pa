<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Tipo_documentos
 *
 * @author  The scaffold-interface created at 2016-03-12 01:24:24pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class TipoDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('tipo_documentos',function (Blueprint $table){
        $table->increments('id');
        $table->string('descripcion');
        $table->softDeletes();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('tipo_documentos');
     }
}
