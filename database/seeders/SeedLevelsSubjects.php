<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedLevelsSubjects extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::factory()
            ->count(5)
            ->hasSubjects(3)
            ->create();
    }
}
