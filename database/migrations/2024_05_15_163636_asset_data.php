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
        Schema::create('asset_data', function (Blueprint $table) {
            $table->id('asset_id')->unique();
            $table->string('asset_name')->nullable();
            $table->timestamps();

            // $table->foreign('wealth_id')->references('wealth_id')->on('wealth_data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_data');
    }
};
