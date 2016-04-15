<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ConfigStatusChat extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
        
		Schema::table('status_chat', function (Blueprint $table) {
				$table->increments("id");
                $table->string("tipo");
                $table->sofotDeletes();
                $table->timestamps();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('status_chat', function (Blueprint $table) {
				Schema::drop('status_chat');
			});
	}
}