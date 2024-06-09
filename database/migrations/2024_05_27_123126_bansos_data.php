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
        Schema::create('bansos_data', function (Blueprint $table) {
            $table->id('bansos_id')->unique();
            $table->unsignedBigInteger('nik')->unique();
            $table->boolean('is_bansosable')->default(false); 
            $table->boolean('status')->default(false); // 0 = belum diterima, 1 = sudah diterima
            $table->timestamps();   

            $table->foreign('nik')->references('nik')->on('citizen_data')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bansos_data');
    }
};
