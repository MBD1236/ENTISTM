<?php

use App\Models\AnneeUniv;
use App\Models\AnneeUniversitaire;
use App\Models\Niveau;
use App\Models\Etudiant;
use App\Models\Programme;
use App\Models\Promotion;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Etudiant::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Programme::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Promotion::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Niveau::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(AnneeUniversitaire::class)->constrained()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
