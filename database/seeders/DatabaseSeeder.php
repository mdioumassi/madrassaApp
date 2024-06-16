<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Level;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SeedCoursesLevels::class,
            SeedLevelsSubjects::class,
            SeedUsersChildren::class,
        ]);
    }
}
