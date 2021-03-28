<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
            Categoria::create(['name' => 'BRAVO 4']);
            Categoria::create(['cnes' => '5366070']);
            Categoria::create(['macro' => '2']);


        }
}


