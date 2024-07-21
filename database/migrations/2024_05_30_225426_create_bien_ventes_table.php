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
        Schema::create('bien_ventes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->text('description'); // Utilisation de text pour des descriptions longues
            $table->string('surface');
            $table->string('piece');
            $table->string('chambre');
            $table->string('etage');
            $table->double('prix');
            $table->string('ville');
            $table->string('adresse');
            $table->unsignedBigInteger('id_pro');
            $table->foreign('id_pro')->references('id')->on('proprietaires')->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
        Schema::dropIfExists('bien_ventes');
    }
};
