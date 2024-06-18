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
        // Ajout de la colonne nullable avec une valeur par défaut
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('service_id')->nullable()->default(null);
        });

        // Ajout de la contrainte de clé étrangère après la création de la colonne
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('service_id')->references('id')->on('services')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropColumn('service_id');
        });
    }
};
