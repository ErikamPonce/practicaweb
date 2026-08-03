<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asignatura_alumno', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idAsignatura')->constrained('asignaturas', 'idAsignatura')->onDelete('cascade');
            $table->string('Matricula')->constrained('alumnos', 'Matricula')->onDelete('cascade');
            $table->decimal('Calificacion', 5, 2)->nullable();
            $table->date('FechaInscripcion');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asignatura_alumno');
    }
};