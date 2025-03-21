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
        Schema::create('employee_payroll', function (Blueprint $table) {
            $table->id();
            $table->string('payroll_bank');
            $table->bigInteger('NoA');
            $table->decimal('nominal_payroll', 15, 2); // Plafond
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_payroll');
    }
};
