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
            $table->string('ecoleorigine');
            $table->string('datenaissance');
            $table->string('lieunaissance');
            $table->string('pere');
            $table->string('mere');
            $table->string('programme');
            $table->string('nomtuteur')->nullable();
            $table->string('telephonetuteur')->unique()->nullable();
            $table->string('adresse')->nullable();
            $table->string('photo')->nullable();
            $table->longText('diplome')->nullable();
            $table->longText('relevenotes')->nullable();
            $table->longText('certificatnationalite')->nullable();
            $table->longText('certificatmedical')->nullable();
            $table->longText('extraitnaissance')->nullable();
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
