<?php

use App\Models\Enseignant;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Semestre;
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
        Schema::create('planifications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Enseignant::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Matiere::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Programme::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Niveau::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Promotion::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Semestre::class)->constrained()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planifications');
    }
};
