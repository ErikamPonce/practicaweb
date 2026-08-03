<?php
// app/Models/Intendencia.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Intendencia extends Model
{
    use HasFactory;
    
    protected $table = 'intendencias';
    protected $primaryKey = 'idEmpleado';
    
    protected $fillable = [
        'Nombre',
        'telefono',
        'Area',
        'turno'
    ];
    
    // Si necesitas relaciones
    public function horarios()
    {
        return $this->belongsToMany(Horario::class, 'intendencia_horario', 'idEmpleado', 'idHorario')
                    ->withTimestamps();
    }
}