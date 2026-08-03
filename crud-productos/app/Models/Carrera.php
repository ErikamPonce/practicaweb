<?php
// app/Models/Carrera.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrera extends Model
{
    use HasFactory;
    
    protected $table = 'carreras';
    protected $primaryKey = 'IdCarrera';
    
    protected $fillable = [
        'NombreCarreras',
        'Estatus'
    ];
    
    protected $casts = [
        'Estatus' => 'boolean'
    ];
    
    // Relaciones
    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'IdCarrera', 'IdCarrera');
    }
    
    // Método para obtener alumnos activos
    public function alumnosActivos()
    {
        return $this->alumnos()->where('Status', 'A');
    }
}