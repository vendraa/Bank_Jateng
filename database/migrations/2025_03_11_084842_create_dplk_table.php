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
        Schema::create('dplk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jumlah_peserta');
            $table->decimal('akumulasi_iuran', 15, 2); // Plafond
            $table->decimal('akumulasi_pengembangan', 15, 2); // Plafond
            $table->decimal('total_saldo', 15, 2); // Plafond
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dplk');
    }
};
