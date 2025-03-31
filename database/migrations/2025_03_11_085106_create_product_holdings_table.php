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
        Schema::create('product_holdings', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('nasabah_id')
                  ->constrained('nasabahs')
                  ->onDelete('cascade');

            $table->string('nama_produk');
            $table->string('status')->default(false);
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
        Schema::table('product_holdings', function (Blueprint $table) {
            $table->dropForeign(['nasabah_id']); 
        });
        Schema::table('product_holdings', function (Blueprint $table) {
            $table->dropForeign(['user_id']); 
        });
        Schema::dropIfExists('product_holdings');
    }
};
