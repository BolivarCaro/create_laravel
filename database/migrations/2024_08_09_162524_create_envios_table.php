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
        Schema::create('envios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_cliente')->constrained('clientes')->onDelete('cascade');
            $table->string('estado_envio');
            $table->float('peso');
            $table->string('direccion_origen');
            $table->string('direccion_destino');
            $table->string('dimensiones');
            $table->date('fecha_envio');
            $table->date('fecha_entrega');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envios');
    }
};
