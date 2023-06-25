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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->integer('rating1');
            $table->string('observation1');
            $table->integer('rating2');
            $table->string('observation2');
            $table->integer('rating3');
            $table->string('observation3');
            $table->integer('rating4');
            $table->string('observation4');
            $table->integer('rating5');
            $table->string('observation5');
            $table->integer('rating6');
            $table->string('observation6');
            $table->integer('rating7');
            $table->string('observation7');
            $table->integer('rating8');
            $table->string('observation8');
            $table->text('reponse');
            $table->text('reponse2');
            $table->text('reponse3');
            $table->text('statut')->nullable();
            $table->unsignedBigInteger('formation_id');
            $table->timestamps();

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
        Schema::dropIfExists('evaluations');
    }
};
