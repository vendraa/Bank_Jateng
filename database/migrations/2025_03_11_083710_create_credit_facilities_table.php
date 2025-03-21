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
        Schema::create('credit_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('kreditur'); 
            $table->decimal('plafond', 15, 2); // Plafond
            $table->decimal('saldo_debit', 15, 2); // Saldo Debet
            $table->date('tanggal_awal'); // Tanggal Awal
            $table->date('tanggal_akhir'); // Tanggal Akhir
            $table->decimal('suku_bunga', 5, 2); // Suku Bunga dalam persen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_facilities');
    }
};
