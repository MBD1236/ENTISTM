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
        Schema::create('information_departements', function (Blueprint $table) {
            $table->id();
            $table->string('departement')->unique();
            $table->string('code')->unique();
            $table->string('telephone')->unique();
            $table->string('email')->unique();
            $table->string('adresse');
            $table->string('photo');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information_departements');
    }
};
