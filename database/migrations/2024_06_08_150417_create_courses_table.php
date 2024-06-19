<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('keywords')->unique()->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });
        DB::table('courses')->insert([
            ['label' => 'Cours d\'arabe enfant', 'keywords' => 'arabe-enfant'],
            ['label' => 'Cours d\'arabe adulte', 'keywords' => 'arabe-adulte'],
            ['label' => 'Cours de coran enfant', 'keywords' => 'coran-enfant'],
            ['label' => 'Cours de coran adulte', 'keywords' => 'coran-adulte'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
