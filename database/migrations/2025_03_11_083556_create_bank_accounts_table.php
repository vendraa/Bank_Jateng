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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('nasabah_id')
                  ->constrained('nasabahs')
                  ->onDelete('cascade');

            $table->string('nama_bank');
            $table->string('rekening');
            $table->decimal('saldo', 15, 2);
            $table->string('jenis');
            $table->date('posisi');
            $table->integer('mobile_banking')->nullable();
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
        Schema::table('bank_accounts', function (Blueprint $table) {
            $table->dropForeign(['nasabah_id']); 
            $table->dropForeign(['user_id']);    
        });
    
        Schema::dropIfExists('bank_accounts');
    }
};
