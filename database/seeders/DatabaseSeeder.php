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
        // $this->call([
        //     SeedCourses::class,
        //     SeedLevels::class,
        //     SeedSubjects::class,
        // ]);
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
        $level1 = Level::first();
        $level2 = Level::find(2);
        $level3 = Level::find(3);

       // $level2 = Level::find(2);
        //$level3 = Level::find(3);

        $course = Course::first();
        $course->levels()->attach(Level::first());
        $course->levels()->attach(Level::find(2));

       // $level = Level::first();
        $level1->subjects()->create([
            'label' => 'Sujet0',
            'slug' => 'sujet0',
            'description' => 'Sujet débutant',
        ]);

        $level1->subjects()->create([
            'label' => 'Sujet1',
            'slug' => 'sujet1',
            'description' => 'Sujet intermédiaire',
        ]);

        $level2->subjects()->create([
            'label' => 'Sujet2',
            'slug' => 'sujet2',
            'description' => 'Sujet avancé',
        ]);

        $level3->subjects()->create([
            'label' => 'Sujet3',
            'slug' => 'sujet3',
            'description' => 'Sujet expert',
        ]);
  



    }
}
