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
        Schema::create('proprietaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('adresse');
            $table->date('birthdate');
            $table->string('telephone');
            $table->string('image')->nullable();
            $table->string('statut');
            $table->unsignedBigInteger('id_abonnement')->nullable(); // Assurez-vous que c'est un unsignedBigInteger
            $table->foreign('id_abonnement')->references('id')->on('abonnements');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proprietaires');
    }
};
