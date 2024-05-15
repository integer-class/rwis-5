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
            $table->string('blood_type')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('disability')->nullable();
            $table->string('disease')->nullable();
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
