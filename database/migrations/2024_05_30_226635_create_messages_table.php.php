<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('contenu');
            $table->unsignedBigInteger('id_cl')->nullable();
            $table->unsignedBigInteger('id_pro')->nullable();
            $table->enum('sender_type', ['client', 'proprietaire']);
            $table->enum('receiver_type', ['client', 'proprietaire']);
            $table->timestamps();

            $table->foreign('id_cl')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('id_pro')->references('id')->on('proprietaires')->onDelete('cascade');       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
