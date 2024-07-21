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
    Schema::create('images', function (Blueprint $table) {
        $table->id();
        $table->foreignId('bien_location_id')->nullable()->constrained('bien_locations')->onDelete('cascade');
        $table->foreignId('bien_vente_id')->nullable()->constrained('bien_ventes')->onDelete('cascade');
        $table->string('path');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('images', function (Blueprint $table) {
        $table->dropForeign(['bien_location_id']);
        $table->dropColumn('bien_location_id');
    });
    Schema::table('images', function (Blueprint $table) {
        $table->dropForeign(['bien_vente_id']);
        $table->dropColumn('bien_vente_id');
    });
}
};


    