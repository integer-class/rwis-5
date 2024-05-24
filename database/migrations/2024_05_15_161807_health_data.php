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
        Schema::create('health_data', function (Blueprint $table) {
            $table->id('health_id');
            $table->integer('age')->nullable()->default(0);
            $table->enum('blood_type', ['A', 'B', 'O', 'AB', 'Belum Tahu'])->nullable()->default('Belum Tahu');
            $table->string('weight')->nullable()->default(0);
            $table->string('height')->nullable()->default(0);
            $table->enum('disability', ['Tidak', 'Ya'])->nullable()->default('Tidak');
            $table->enum('disease', ['Tidak', 'Ya'])->nullable()->default('Tidak');
            $table->timestamps();

            // $table->foreign('citizen_data_id')->references('citizen_data_id')->on('citizen_data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_data');
    }
};
