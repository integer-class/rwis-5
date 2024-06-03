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
        Schema::create('citizen_user_data', function (Blueprint $table) {
            $table->id('citizen_user_id');
            $table->unsignedBigInteger('citizen_data_id')->nullable();
            $table->string('nik')->unique();
            $table->enum('level', ['rw', 'rt', 'warga'])->default('warga'); 
            $table->string('no_rt')->nullable();
            $table->string('password');
            $table->timestamps();

            // $table->foreign('citizen_data_id')->references('citizen_data_id')->on('citizen_data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizen_user_data');
    }
};
