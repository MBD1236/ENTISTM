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
        Schema::create('gupols', function (Blueprint $table) {
            $table->id();
            $table->string('ine')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('pv');
            $table->string('ecoleorigine');
            $table->string('centreexamen');
            $table->date('datenaissance');
            $table->string('lieunaissance');
            $table->string('pere');
            $table->string('mere');
            $table->string('email');
            $table->string('telephone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gupols');
    }
};
