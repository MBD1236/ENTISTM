<?php

use App\Models\Departement;
use App\Models\Etudiant;
use App\Models\NatureRecu;
use App\Models\Promotion;
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
        Schema::create('recus', function (Blueprint $table) {
            $table->id();
            $table->string('numerorecu');
            $table->string('serie');
            $table->string('modereglement');
            $table->string('somme');
            $table->boolean('estVisible')->default(true);
            $table->foreignIdFor(Etudiant::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(NatureRecu::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Departement::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Promotion::class)->constrained()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recus');
    }
};
