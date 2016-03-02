<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPropertysUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
          $table->string('user_name')->unique();
          $table->string('pasaporte')->unique();
          $table->string('cedula')->unique();
          $table->enum('type', ['propietario', 'admin','super'])->default('propietario');



      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('slug');
          $table->dropColumn('user_name')->unique();
          $table->dropColumn('pasaporte')->unique();
          $table->dropColumn('cedula')->unique();
          $table->dropColumn('type', ['propietario', 'admin','super'])->default('propietario');
      });
    }
}
