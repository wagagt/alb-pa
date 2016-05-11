<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentosChatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('documentos_chats', function (Blueprint $table) {
				$table->increments('id');
				$table->string('nombre', 100);
				$table->string('path', 250);
				$table->String('archivo', 100);
				$table->timestamps();
				$table->softDeletes();

				$table->integer('tipo_doc_id')->unsigned();
				$table->foreign('tipo_doc_id')->references('id')->on('tipo_documentos');

				$table->integer('doc_id')->unsigned();
				$table->foreign('doc_id')->references('id')->on('documentos');

				$table->integer('chat_id')->unsigned();
				$table->foreign('chat_id')->references('id')->on('chat_docts');
			});

	}

	/*
	@unsigned relation Ship bitwin documets and tipo_docuemento
	 */

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('documentos_chats');
	}
}
