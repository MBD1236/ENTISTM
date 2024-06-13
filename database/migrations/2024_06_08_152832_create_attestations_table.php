<?php

use App\Models\AnneeUniversitaire;
use App\Models\AttestationType;
use App\Models\Etudiant;
use App\Models\Niveau;
use App\Models\Programme;
use App\Models\Reference;
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
            $table->foreignIdFor(Reference::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(AttestationType::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Etudiant::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Niveau::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(AnneeUniversitaire::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Programme::class)->constrained()->cascadeOnUpdate();
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
