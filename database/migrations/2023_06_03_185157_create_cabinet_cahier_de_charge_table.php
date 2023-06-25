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
        Schema::create('cabinet_cahier_de_charge', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cabinet_id');
            $table->unsignedBigInteger('cahier_de_charge_id');
            $table->timestamps();

            $table->foreign('cabinet_id')->references('id')->on('cabinets')->onDelete('cascade');
            $table->foreign('cahier_de_charge_id')->references('id')->on('cahier_de_charges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabinet_cahier_de_charge');
    }
};
