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
        Schema::create('enseres', function (Blueprint $table) {
            $table->id();
            $table->string('concepto');
            $table->date('fecha');
            $table->decimal('valor', 10, 2);
            $table->foreignId('id_ubicacion')->constrained('ubicacion')->onDelete('cascade');
            $table->foreignId('id_factura')->constrained('factura')->onDelete('cascade');
            $table->string('estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseres');
    }
};
