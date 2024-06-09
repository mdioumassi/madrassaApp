<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedSubjects extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            'label' => 'Sujet0',
            'slug' => 'sujet0',
            'description' => 'Sujet débutant',
        ]);

        DB::table('subjects')->insert([
            'label' => 'Sujet1',
            'slug' => 'sujet1',
            'description' => 'Sujet intermédiaire',
        ]);

        DB::table('subjects')->insert([
            'label' => 'Sujet2',
            'slug' => 'sujet2',
            'description' => 'Sujet avancé',
        ]);
    }
}
