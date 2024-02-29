<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            'nombre' => 'pantalon',
            'descripcion' => 'pantalon largo algodon'
        ]);

        DB::table('productos')->insert([
            'nombre' => 'tomates',
            'descripcion' => 'tomates frescos'
        ]);

        DB::table('productos')->insert([
            'nombre' => 'falda',
            'descripcion' => 'falda de pana'
        ]);
    }
}
