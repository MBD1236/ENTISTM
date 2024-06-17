<?php

use App\Models\Service;
use App\Models\User;
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
        Schema::create('partage_files', function (Blueprint $table) {
            $table->id();
            $table->string('fichier');
            $table->foreignIdFor(Service::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partage_files');
    }
};
