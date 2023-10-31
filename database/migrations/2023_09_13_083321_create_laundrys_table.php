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
        Schema::create('laundrys', function (Blueprint $table) {
            $table->id();
            $table->enum('kuota', ['Cuci Setrika', 'Setrika', 'Cuci']);
            $table->integer('berat')->nullable();
            $table->integer('price')->nullable();
            $table->enum('cabang', ['Tangerang', 'Bekasi']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundrys');
    }
};
