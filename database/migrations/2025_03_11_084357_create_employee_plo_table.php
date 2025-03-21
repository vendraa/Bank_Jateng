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
        Schema::create('employee_plos', function (Blueprint $table) {
            $table->foreignId('id')
                  ->constrained('nasabahs')
                  ->onDelete('cascade')
                  ->primary();

            $table->bigInteger('NoA');
            $table->decimal('plafond', 15, 2);
            $table->decimal('baki_debet', 15, 2); 
            $table->decimal('angsuran', 15, 2);
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
        Schema::table('employee_plos', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('employee_plos');
    }
};
