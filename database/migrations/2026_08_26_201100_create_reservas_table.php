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
        Schema::create('reservas', function (Blueprint $table) {
        $table->id();

        $table->foreignId('cliente_id')
            ->constrained('clientes')
            ->cascadeOnDelete();

        $table->foreignId('cabana_id')
            ->constrained('cabanas')
            ->cascadeOnDelete();

        $table->date('fecha_entrada');
        $table->date('fecha_salida');

        $table->unsignedInteger('cantidad_huespedes');

        $table->decimal('precio_total', 12, 2);

        $table->string('estado')->default('pendiente');

        $table->text('observaciones')->nullable();

        $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
