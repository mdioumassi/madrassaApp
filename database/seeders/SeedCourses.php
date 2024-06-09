<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedCourses extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            'label' => 'Arabe',
            'slug' => 'arabe',
            'description' => 'Cours d\'arabe',
        ]);

        DB::table('courses')->insert([
            'label' => 'Coran',
            'slug' => 'coran',
            'description' => 'Cours de coran',
        ]);

        DB::table('courses')->insert([
            'label' => 'Islam',
            'slug' => 'islam',
            'description' => 'Cours d\'islam',
        ]);
    }
}
