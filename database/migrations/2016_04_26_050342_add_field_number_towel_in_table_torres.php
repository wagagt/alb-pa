<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldNumberTowelInTableTorres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('torres',function(Blueprint $table){
            $table->string('torre_numero');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('torres', function(Blueprint $table){
        $table->dropColumn('torre_numero');
      });
    }
}
