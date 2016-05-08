<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificaionesChatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('notificaiones_chats', function (Blueprint $table) {
				$table->increments('id');
				$table->string('texto', 255);
				$table->timestamps();
				$table->softDeletes();

				$table->integer('documento_id')->unsigned();
				$table->foreign('documento_id')->references('id')->on('documentos');

				$table->integer('status_id')->unsigned();
				$table->foreign('status_id')->references('id')->on('status_coments');

				$table->integer('user_send_id')->unsigned();
				$table->foreign('user_send_id')->references('id')->on('users');

				$table->integer('user_recibe_id')->unsigned();
				$table->foreign('user_recibe_id')->references('id')->on('users');

				$table->integer('doc_chat_id')->unsigned();
				$table->foreign('doc_chat_id')->references('id')->on('documentos_chats');

			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('notificaiones_chats');
	}
}
