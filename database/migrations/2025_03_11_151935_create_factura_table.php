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
        Schema::create('factura', function (Blueprint $table) {
            $table->id();
            $table->string('no_orden_compra');
            $table->string('no_requisicion');
            $table->decimal('importe', 10, 2);
            $table->string('folio');
            $table->date('fecha');
            $table->foreignId('id_proveedor')->constrained('proveedor')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura');
    }
};
