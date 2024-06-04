<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname')->nullable();
            $table->string('civility')->nullable();
            $table->string('phone', 50)->index()->nullable();
            $table->string('full_address', 255)->nullable();
            $table->string('function')->nullable();
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('civility');
            $table->dropColumn('phone');
            $table->dropColumn('full_address');
            $table->dropColumn('function');
            $table->dropColumn('type');
        });
    }
};
