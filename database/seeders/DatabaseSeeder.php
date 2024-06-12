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
        $arabe1 = DB::table('courses')->insert([
            'label' => 'Arabe pour Enfant',
            'slug' => 'arabe-pour-enfant',
           // 'is_child' => true,
            'comment' => 'Cours d\'arabe pour enfant',
        ]);

        $arabe2 = DB::table('courses')->insert([
            'label' => 'Arabe pour Adulte',
            'slug' => 'arabe-pour-adulte',
            //'is_adult' => true,
            'comment' => 'Cours d\'arabe pour adulte',
        ]);

        $arabe3 = DB::table('courses')->insert([
            'label' => 'Coran pour Enfant',
            'slug' => 'coran-pour-enfant',
            //'is_child' => true,
            'comment' => 'Cours de coran pour enfant',
        ]);

        DB::table('courses')->insert([
            'label' => 'Coran pour Adulte',
            'slug' => 'coran-pour-adulte',
           // 'is_adult' => true,
            'comment' => 'Cours de coran pour adulte',
        ]);

        $level_id1 = DB::table('levels')->insert([
            'label' => 'NIVEAU LANGUE ARABE 0/ 0 INTERMÉDIAIRE',
            'slug' => 'niveau-langue-arabe-0-0-intermediaire',
            'tarif' => '330',
            'registration_fees' => '20€',
            'hours' => '2h/semaine',
            'comment' => 'Niveau débutant',
        ]);

        $level_id2 = DB::table('levels')->insert([
            'label' => 'NIVEAU 1/2 LANGUE ARABE',
            'slug' => 'niveau-langue-arabe-1-2',
            'tarif' => '330',
            'registration_fees' => '20€',
            'hours' => '3h/semaine',
            'comment' => 'Niveau intermédiaire',
        ]);

        $level_id3 = DB::table('levels')->insert([
            'label' => 'NIVEAU 3/4/5/6 LANGUE ARABE',
            'slug' => 'niveau-langue-arabe-3-4-5-6',
            'tarif' => '330',
            'registration_fees' => '20€',
            'hours' => '3h/semaine',
            'comment' => 'Niveau avancé',
        ]);

    
        

    
        $level->subjects()->create([
            'label' => 'Conférence en français sur la nature de la langue arabe',
            'comment' => 'Conférence en français sur la nature de la langue arabe',
        ]);

        $level->subjects()->create([
            'label' => 'Dialogues, grammaire et conjugaison; étude du livre 1',
            'comment' => 'Dialogues, grammaire et conjugaison; étude du livre 1',
        ]);

    }
}
