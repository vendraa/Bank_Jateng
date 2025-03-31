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
        Schema::create('dplks', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('nasabah_id')
                  ->constrained('nasabahs')
                  ->onDelete('cascade');

            $table->bigInteger('jumlah_peserta');
            $table->decimal('akumulasi_iuran', 15, 2); // Plafond
            $table->decimal('akumulasi_pengembangan', 15, 2); // Plafond
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
        Schema::table('dplks', function (Blueprint $table) {
            $table->dropForeign(['nasabah_id']); 
            $table->dropForeign(['user_id']); 
        });
        Schema::dropIfExists('dplks');
    }
};
