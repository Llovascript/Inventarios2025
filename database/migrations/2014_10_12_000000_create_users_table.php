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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname1');
            $table->string('lastname2');
            $table->string('codigo')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('estatus')->default('activo');
            $table->foreignId('id_role')->constrained('roles');
            $table->foreignId('id_puesto')->constrained('puestos');
            $table->timestamp('email_verified_at')->nullable()->useCurrent();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
