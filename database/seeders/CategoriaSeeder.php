<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Categoria::insert([
            ['catnome' => 'Alimentação'],
            ['catnome' => 'Transporte'],
            ['catnome' => 'Lazer'],
            ['catnome' => 'Outros']
        ]);
    }
}
