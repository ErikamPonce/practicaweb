<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->string('Matricula', 20)->primary();
            $table->foreignId('IdCarrera')->constrained('carreras', 'IdCarrera');
            $table->foreignId('IdDatosP')->constrained('datos_personales', 'IdDatosP');
            $table->char('Status', 1)->default('A'); // A: Activo, B: Baja, G: Graduado
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};