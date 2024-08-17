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
        Schema::create('groupe_formations', function (Blueprint $table) {
            $table->id();
            $table->string('nomGroupe');
            $table->unsignedBigInteger('formation_id');        
            $table->foreign('formation_id')->references('id')->on('formations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupe_formations');
    }
};
