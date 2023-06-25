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
        Schema::create('cahier_de_charges', function (Blueprint $table) {
            $table->id();
            $table->string('domaine');
            $table->string('themes');
            $table->string('recommandations');
            $table->string('mode');
            $table->string('duree');
            $table->date('date');
            $table->string('personnel');
            $table->string('profil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cahier_de_charges');
    }
};
