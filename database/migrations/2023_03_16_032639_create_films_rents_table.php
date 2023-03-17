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
        Schema::create('films_rents', function (Blueprint $table) {
           
            $table->foreignId('id_film')->constrained('films')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_rent')->constrained('rents')->onUpdate('cascade')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films_rents');
    }
};
