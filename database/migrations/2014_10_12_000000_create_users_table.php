<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('usuario');
            $table->string('email')->unique();
            $table->string('pasaporte');
            $table->string('cedula');
            $table->string('password', 60);
            $table->enum('tipo', ['propietario','admin','super_admin'])->default('propietario');
            $table->boolean('status')->default(0);
            $table->text('observaciones');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('users');
    }
}
