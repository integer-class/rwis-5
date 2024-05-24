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
        Schema::create('family_data', function (Blueprint $table) {
            $table->id('family_id')->unique();
            $table->string('family_head_name')->nullable()->default('Belum Diisi');
            $table->string('address')->nullable()->default('Belum Diisi');
            $table->string('rt')->nullable()->default('Belum Diisi');
            $table->string('rw')->nullable()->default('Belum Diisi');
            $table->string('village')->nullable()->default('Belum Diisi');
            $table->string('sub_district')->nullable()->default('Belum Diisi');
            $table->string('city')->nullable()->default('Belum Diisi');
            $table->string('province')->nullable()->default('Belum Diisi');
            $table->string('postal_code')->nullable()->default('Belum Diisi');
            $table->boolean('is_archived')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->timestamps();

            // $table->foreign('citizen_data_id')->references('citizen_data_id')->on('citizen_data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_data');
    }
};
