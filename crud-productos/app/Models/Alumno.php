<?php
// app/Models/Alumno.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumno extends Model
{
    use HasFactory;
    
    protected $table = 'alumnos';
    protected $primaryKey = 'Matricula';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'Matricula',
        'IdCarrera',
        'IdDatosP',
        'Status'
    ];
    
    // Relaciones
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'IdCarrera', 'IdCarrera');
    }
    
    public function datosPersonales()
    {
        return $this->belongsTo(DatosPersonales::class, 'IdDatosP', 'IdDatosP');
    }
    
    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class, 'asignatura_alumno', 'Matricula', 'idAsignatura')
                    ->withPivot('Calificacion', 'FechaInscripcion')
                    ->withTimestamps();
    }
    
    // Métodos del diagrama de clases
    public function inscribir($idAsignatura)
    {
        return $this->asignaturas()->attach($idAsignatura, [
            'FechaInscripcion' => now(),
            'Calificacion' => null
        ]);
    }
    
    public function actualizarStatus($nuevoStatus)
    {
        $this->Status = $nuevoStatus;
        return $this->save();
    }
    
    public static function listadoAlumnosCarrera($IdCarrera)
    {
        return self::with(['datosPersonales', 'carrera'])
                    ->where('IdCarrera', $IdCarrera)
                    ->get();
    }
    
    public function asegurarCarrera($IdCarrera)
    {
        $this->IdCarrera = $IdCarrera;
        return $this->save();
    }
    
    public function actualizarDatos(array $datos)
    {
        return $this->update($datos);
    }
}