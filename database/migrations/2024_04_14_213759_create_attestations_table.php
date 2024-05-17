<?php

use App\Models\AnneeUniversitaire;
use App\Models\Etudiant;
use App\Models\Niveau;
use App\Models\Programme;
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
        Schema::create('attestations', function (Blueprint $table) {
            $table->id();
            $table->string('reff');
            $table->string('type');
            $table->foreignIdFor(Etudiant::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(AnneeUniversitaire::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Niveau::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Programme::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attestations');
    }
};
