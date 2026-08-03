<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->id('IdPersonal');
            $table->foreignId('IdDatosP')->constrained('datos_personales', 'IdDatosP');
            $table->foreignId('IdTipo')->constrained('tipos_personal', 'idTipo');
            $table->string('ClaveEmp', 10)->unique();
            $table->boolean('Status')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal');
    }
};