<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('etiquetas')->insert([
            'nombre' => 'Etiqueta 1'
        ]);

        DB::table('etiquetas')->insert([
            'nombre' => 'Etiqueta 2'
        ]);
    }
}
