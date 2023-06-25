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
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->enum('presence', ['present', 'absent', 'remplacer']);
            $table->string('note');
            $table->unsignedBigInteger('formation_id')->nullable();
            $table->unsignedBigInteger('employee_id');
            $table->timestamps();

            $table->foreign('formation_id')
            ->references('id')
            ->on('formations');
            $table->foreign('employee_id')
                  ->references('id')
                  ->on('employees')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
