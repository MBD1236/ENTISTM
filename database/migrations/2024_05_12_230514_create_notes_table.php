<?php

use App\Models\Inscription;
use App\Models\Matiere;
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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Inscription::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Matiere::class)->constrained()->cascadeOnUpdate();
            $table->integer('note1');
            $table->integer('note2');
            $table->integer('note3');
            $table->integer('moyenne_generale');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
