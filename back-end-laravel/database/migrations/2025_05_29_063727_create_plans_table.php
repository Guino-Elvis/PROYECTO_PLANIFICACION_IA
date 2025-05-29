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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->enum('status', [1, 2]); //1:escondido  2:visible
            $table->string('name'); // Nombre del plan (e.g., Starter, Company)
            $table->decimal('monthly_price', 8, 2); // Precio mensual
            $table->string('description')->nullable(); // Descripción del plan
            $table->string('team_size'); // Tamaño del equipo (e.g., "1 developer")
            $table->integer('premium_support_months'); // Meses de soporte premium
            $table->integer('free_updates_months'); // Meses de actualizaciones gratuitas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
