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
        Schema::create('frontenseignants', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2024_05_31_035446_create_frontenseignants_table.php
            $table->string('nom');
            $table->string('prenom');
            $table->string('cours');
            $table->string('link_fb')->nullable()->unique();
            $table->string('link_in')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('tel')->nullable()->unique();
            $table->string('image_path')->nullable();
=======
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('email');
            $table->string('adresse');
            $table->string('photo');
            $table->foreignIdFor(Departement::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
>>>>>>> 4d87b469dfc49f5d3986e53e6e3af4cf1e50a842:database/migrations/2024_05_26_025120_create_enseignants_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontenseignants');
    }
};
