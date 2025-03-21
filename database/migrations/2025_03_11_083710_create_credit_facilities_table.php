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
            $table->foreignId('id')
                  ->constrained('nasabahs')
                  ->onDelete('cascade')
                  ->primary();

            $table->string('kreditur'); 
            $table->decimal('plafond', 15, 2);
            $table->decimal('saldo_debit', 15, 2);
            $table->date('tanggal_awal'); 
            $table->date('tanggal_akhir'); 
            $table->decimal('suku_bunga', 5, 2);
            $table->timestamps();

            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id') 
                  ->references('id') 
                  ->on('users') 
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('credit_facilities', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('credit_facilities');
    }
};
