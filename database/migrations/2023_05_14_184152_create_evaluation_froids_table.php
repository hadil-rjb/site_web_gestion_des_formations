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
        Schema::create('evaluation_froids', function (Blueprint $table) {
            $table->id();
            $table->string('resultat');
            $table->string('qualite');
            $table->string('competences');
            $table->string('productivite');
            $table->string('motiviation');
            $table->string('esprit');
            $table->string('systeme');
            $table->string('suggerer');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('formation_id');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->foreign('formation_id')
            ->references('id')
            ->on('formations')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_froids');
    }
};
