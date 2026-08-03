<?php
// app/Models/Asignatura.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asignatura extends Model
{
    use HasFactory;
    
    protected $table = 'asignaturas';
    protected $primaryKey = 'idAsignatura';
    
    protected $fillable = [
        'Nombre',
        'HorasTotales'
    ];
    
    // Relaciones
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'asignatura_alumno', 'idAsignatura', 'Matricula')
                    ->withPivot('Calificacion', 'FechaInscripcion')
                    ->withTimestamps();
    }
    
    // Método para obtener alumnos aprobados (calificación >= 6)
    public function alumnosAprobados()
    {
        return $this->alumnos()->wherePivot('Calificacion', '>=', 6);
    }
}