<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('escuelas', function (Blueprint $table) {
            $table->string('CCT', 10)->primary();
            $table->string('Nombre', 100);
            $table->string('Telefono', 10);
            $table->string('Email', 100);
            $table->string('Calle', 80);
            $table->integer('NumE');
            $table->foreignId('idLocalidad')->constrained('localidades', 'idLocalidad');
            $table->foreignId('idMunicipio')->constrained('municipios', 'idMunicipio');
            $table->foreignId('idEstado')->constrained('estados', 'idEstado');
            $table->integer('CP');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('escuelas');
    }
};