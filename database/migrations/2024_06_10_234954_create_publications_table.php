<?php

use App\Models\Cour;
use App\Models\Niveau;
use App\Models\Programme;
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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cour::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Promotion::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Programme::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Niveau::class)->constrained()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
