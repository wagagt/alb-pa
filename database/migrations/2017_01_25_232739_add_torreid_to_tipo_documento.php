<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTorreidToTipoDocumento extends Migration
{
    public function up()
    {
        Schema::table('tipo_documentos', function($table) {
            			$table->integer('torre_id')->unsigned()->nullable();
				        $table->foreign('torre_id')->references('id')->on('torres');
        });
    }

   public function down()
    {
        Schema::table('tipo_documentos', function($table) {
            $table->dropColumn('torre_id');
        });
    }
}
