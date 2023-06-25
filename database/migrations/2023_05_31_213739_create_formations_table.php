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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->integer('duree')->nullable();
            $table->string('budget')->nullable();
            $table->date('date')->nullable();
            $table->unsignedBigInteger('formateur_id')->nullable();
            $table->unsignedBigInteger('planning_id')->nullable();
            $table->unsignedBigInteger('cahier_de_charge_id')->nullable();
            $table->timestamps();

            $table->foreign('formateur_id')
            ->references('id')
            ->on('formateurs')
            ->onDelete('cascade');
            $table->foreign('planning_id')
            ->references('id')
            ->on('plannings')
            ->onDelete('cascade');
            $table->foreign('cahier_de_charge_id')
            ->references('id')
            ->on('cahier_de_charges')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
