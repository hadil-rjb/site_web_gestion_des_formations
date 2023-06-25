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
        Schema::create('cabinets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('address'); // Ajout de l'attribut "address" pour stocker l'adresse du cabinet
            $table->string('phone_number'); // Ajout de l'attribut "phone_number" pour stocker le numéro de téléphone du cabinet
            $table->string('website')->nullable(); // Ajout de l'attribut "website" pour stocker le site web du cabinet (optionnel)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabinets');
    }
};
