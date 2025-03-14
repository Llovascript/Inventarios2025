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
        Schema::create('bienes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('serie');
            $table->date('fecha');
            $table->string('qr');
            $table->foreignId('id_factura')->constrained('factura')->onDelete('cascade');
            $table->foreignId('id_tipo_bien')->constrained('tipo_bien')->onDelete('cascade');
            $table->foreignId('id_tipo_activo')->constrained('tipo_activo')->onDelete('cascade');
            $table->foreignId('id_marca')->constrained('marca')->onDelete('cascade');
            $table->foreignId('id_modelo')->constrained('modelo')->onDelete('cascade');
            $table->foreignId('id_ubicacion')->constrained('ubicacion')->onDelete('cascade');
            $table->string('estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bienes');
    }
};
