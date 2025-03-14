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
        Schema::create('proveedor', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_pat');
            $table->string('apellido_mat');
            $table->string('correo')->unique();
            $table->string('RFC');
            $table->string('razon_social');
            $table->string('tel_oficina')->unique();
            $table->string('tel_personal')->unique();
            $table->string('estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedor');
    }
};
