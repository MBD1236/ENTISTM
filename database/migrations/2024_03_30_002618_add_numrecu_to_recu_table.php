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
        Schema::table('recus', function (Blueprint $table) {
            $table->string('numrecu')->unique();
            $table->string('serie');
            $table->string('nature');
            $table->string('modereglement');
            $table->string('somme');
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recus', function (Blueprint $table) {
            $table->dropColumn('numrecu');
            $table->dropColumn('serie');
            $table->dropColumn('nature');
            $table->dropColumn('modereglement');
            $table->dropColumn('somme');
            $table->dropColumn('date');
        });
    }
};
