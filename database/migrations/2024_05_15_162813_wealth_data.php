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
            $table->id('wealth_id')->unique();
            $table->enum('job', ['Pelajar', 'PNS', 'TNI', 'POLRI', 'Swasta', 'Wiraswasta', 'Petani', 'Nelayan', 'Buruh', 'Lainnya'])->nullable()->default('lainnya');
            $table->enum('education', ['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana', 'Magister', 'Doktor'])->nullable()->default('SD');
            $table->enum('income',['1', '2', '3', '4', '5', '6'])->nullable()->default('1');
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
