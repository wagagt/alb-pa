<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(PaisesTableSeeder::class);
        $this->call(OficinasTableSeeder::class);
        $this->call(TorresTableSeeder::class);
        $this->call(ApartamentoTableSeeder::class);
        $this->call(TipoDocumentosTableSeeder::class);
        $this->call(DocumentosTableSeeder::class);
        $this->call(MarcaAutosTableSeeder::class);

        Model::reguard();
    }
}
