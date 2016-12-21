<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Flynsarmy\CsvSeeder\CsvSeeder;

class ApartamentoTableSeeder extends CsvSeeder
{
        public function __construct()
    {
        $this->table = 'apartamentos';
        $this->csv_delimiter = '|';
        $this->filename = base_path().'/database/seeds/csvs/exp-apartamentos.csv';
    }

    public function run()
    {
         parent::run();
    }
}
