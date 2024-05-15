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
            $table->id('family_id');
            $table->unsignedBigInteger('citizen_data_id');
            $table->string('family_card_number');
            $table->string('family_head_name');
            $table->string('family_head_nik');
            $table->string('address');
            $table->string('rt');
            $table->string('rw');
            $table->string('village');
            $table->string('sub_district');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
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
