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
        Schema::create('resguardo', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_de_alta');
            $table->decimal('costo_unitario', 10, 2);
            $table->decimal('costo_total', 12, 2);
            $table->foreignId('id_bienes')->nullable()->constrained('bienes')->onDelete('set null');
            $table->foreignId('id_enseres')->nullable()->constrained('enseres')->onDelete('set null');
            $table->foreignId('id_resguardante')->constrained('resguardantes')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->boolean('asignado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resguardo');
    }
};
