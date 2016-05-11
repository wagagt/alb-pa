<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();

		$this->call(UserTableSeeder::class );
		$this->call(PaisesTableSeeder::class );
		$this->call(OficinasTableSeeder::class );
		$this->call(TorresTableSeeder::class );
		$this->call(ApartamentoTableSeeder::class );
		$this->call(TipoDocumentosTableSeeder::class );
		$this->call(DocumentosTableSeeder::class );
		$this->call(MarcaAutosTableSeeder::class );
		$this->call(ArchivoDocumentosSeeder::class );

		$this->call(StatusComentsSeeder::class );
		$this->call(chatDocumentsSeeder::class );

		Model::reguard();
	}
}
