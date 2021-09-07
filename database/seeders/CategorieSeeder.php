<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'categorie' => 'action',
        ]);

        DB::table('categories')->insert([
            'categorie' => 'thriller',
        ]);

        DB::table('categories')->insert([
            'categorie' => 'comedie',
        ]);

        DB::table('categories')->insert([
            'categorie' => 'romantique',
        ]);

        
    }
}
