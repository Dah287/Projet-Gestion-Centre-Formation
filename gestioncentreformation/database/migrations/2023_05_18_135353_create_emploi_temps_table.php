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
        Schema::create('emploi_temps', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('salle_id');
            $table->unsignedBigInteger('professeur_id');
            $table->unsignedBigInteger('groupe_formation_id');
            $table->foreign('salle_id')->references('id')->on('salles');
            $table->foreign('professeur_id')->references('id')->on('professeurs');
            $table->foreign('groupe_formation_id')->references('id')->on('groupe_formations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploi_temps');
    }
};
