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
            $table->id('citizen_data_id');
            $table->unsignedBigInteger('family_id')->nullable();
            $table->unsignedBigInteger('health_id')->nullable();
            $table->unsignedBigInteger('wealth_id')->nullable();
            $table->string('name')->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->enum('marital_status', ['belum kawin', 'kawin', 'cerai hidup', 'cerai mati'])->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('religion')->nullable();
            $table->string('address_ktp')->nullable();
            $table->string('address_domisili')->nullable();
            $table->timestamps();

            // $table->foreign('citizen_user_id')->references('citizen_user_id')->on('citizen_user_data');
            // $table->foreign('family_id')->references('family_id')->on('family_data');
            // $table->foreign('health_id')->references('health_id')->on('health_data');
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