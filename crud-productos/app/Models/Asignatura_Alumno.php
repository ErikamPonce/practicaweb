<?php
// app/Models/AsignaturaAlumno.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AsignaturaAlumno extends Model
{
    use HasFactory;
    
    protected $table = 'asignatura_alumno';
    
    protected $fillable = [
        'idAsignatura',
        'Matricula',
        'Calificacion',
        'FechaInscripcion'
    ];
    
    protected $casts = [
        'FechaInscripcion' => 'date',
        'Calificacion' => 'decimal:2'
    ];
    
    // Relaciones
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'idAsignatura', 'idAsignatura');
    }
    
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'Matricula', 'Matricula');
    }
}