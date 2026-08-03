<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('horario_personal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idHorario')->constrained('horarios', 'idHorario')->onDelete('cascade');
            $table->foreignId('IdPersonal')->constrained('personal', 'IdPersonal')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horario_personal');
    }
};