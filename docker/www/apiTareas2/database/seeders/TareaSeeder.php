<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tareas')->insert([
            'titulo' => 'tarea 1',
            'descripcion' => 'descripcion tarea 1'
        ]);

        DB::table('tareas')->insert([
            'titulo' => 'tarea 2',
            'descripcion' => 'descripcion tarea 2'
        ]);
    }
}
