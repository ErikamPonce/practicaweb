<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('intendencia', function (Blueprint $table) {
            $table->id('idEmpleado');
            $table->string('Nombre', 50);
            $table->string('Telefono', 10);
            $table->string('Area', 20);
            $table->string('Turno', 20);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};