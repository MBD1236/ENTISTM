<?php

use App\Models\Etudiant;
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
        Schema::create('releve_notes', function (Blueprint $table) {
            $table->id();
            $table->string('ine');
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('programme');
            $table->foreignIdFor(Etudiant::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Reference::class)->constrained()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('releve_notes');
    }
};
