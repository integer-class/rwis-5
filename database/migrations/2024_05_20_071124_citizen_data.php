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
        Schema::create('citizen_data', function (Blueprint $table) {
            $table->id('citizen_data_id')->unique();
            $table->unsignedBigInteger('family_id')->nullable();
            $table->unsignedBigInteger('health_id')->nullable();
            $table->unsignedBigInteger('wealth_id')->nullable();
            $table->string('name')->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->enum('maritial_status', ['Belum kawin', 'Kawin', 'Cerai hidup', 'Cerai mati'])->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('religion', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'])->nullable();
            $table->string('address_ktp')->nullable();
            $table->string('address_domisili')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('is_archived')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->timestamps();

            $table->foreign('family_id')->references('family_id')->on('family_data')->onDelete('cascade');
            $table->foreign('health_id')->references('health_id')->on('health_data')->onDelete('cascade');
            $table->foreign('wealth_id')->references('wealth_id')->on('wealth_data')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizen_data');
    }
};
