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
        Schema::create('wealth_data', function (Blueprint $table) {
            $table->id('wealth_id');
            $table->string('asset_id')->nullable();
            $table->string('job')->nullable();
            $table->string('education')->nullable();
            $table->string('income')->nullable();
            $table->timestamps();

            // $table->foreign('citizen_data_id')->references('citizen_data_id')->on('citizen_data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wealth_data');
    }
};
