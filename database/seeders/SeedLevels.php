<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedLevels extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('levels')->insert([
            'label' => 'Niveau0',
            'slug' => 'niveau0',
            'description' => 'Niveau débutant',
        ]);

        DB::table('levels')->insert([
            'label' => 'Niveau1',
            'slug' => 'niveau1',
            'description' => 'Niveau intermédiaire',
        ]);

        DB::table('levels')->insert([
            'label' => 'Niveau2',
            'slug' => 'niveau2',
            'description' => 'Niveau avancé',
        ]);
    }
}
