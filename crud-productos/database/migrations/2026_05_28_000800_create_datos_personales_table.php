<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('datos_personales', function (Blueprint $table) {
            $table->id('IdDatosP');
            $table->string('Nombre', 50);
            $table->string('ApellidoPaterno', 50);
            $table->string('ApellidoMaterno', 50);
            $table->date('FechaNacimiento');
            $table->foreignId('idGenero')->constrained('generos', 'idGenero');
            $table->string('Telefono', 10);
            $table->string('Email', 100);
            $table->string('Calle', 80);
            $table->integer('NumE');
            $table->foreignId('idLocalidad')->constrained('localidades', 'idLocalidad');
            $table->integer('CP');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('datos_personales');
    }
};