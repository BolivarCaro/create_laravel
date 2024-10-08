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
        Schema::create('recipients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table -> string('nombre');
            $table -> string('apellido');
            $table -> string('document_type');
            $table -> string('document');
            $table -> string('email');
            $table -> string('telefono');
            $table -> string('direccion');
            $table -> string('ciudad');
            $table -> string('departamento');
            $table -> string('codigo_postal');

            $table -> unsignedBigInteger('id_cliente');
            $table -> foreign('id_cliente') -> references( 'id' ) -> on('clientes') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipients');
    }
};
