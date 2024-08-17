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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->double('montant');
            $table->date('datePaiement');
            $table->double('reste');
            $table->unsignedBigInteger('etudiant_id');              
            $table->unsignedBigInteger('formation_id');        
            $table->foreign('etudiant_id')->references('id')->on('etudiants');      
            $table->foreign('formation_id')->references('id')->on('formations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
