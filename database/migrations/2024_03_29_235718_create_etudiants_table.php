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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone')->unique();
            $table->string('email')->unique();
            $table->integer('pv')->unique();
            $table->string('ine')->unique();
            $table->string('session');
            $table->string('profil');
            $table->string('centre');
            $table->string('ecole_origine');
            $table->string('date_naissance');
            $table->string('lieu_naissance');
            $table->string('pere');
            $table->string('mere');
            $table->string('programme');
            $table->string('nom_tuteur')->nullable();
            $table->string('telephone_tuteur')->unique()->nullable();
            $table->string('adresse')->nullable();
            $table->string('photo')->nullable();
            $table->longText('diplome')->nullable();
            $table->longText('releve_notes')->nullable();
            $table->longText('certificat_nationalite')->nullable();
            $table->longText('certificat_medical')->nullable();
            $table->longText('extrait_naissance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
