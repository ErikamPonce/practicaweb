<?php
// app/Models/Horario.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horario extends Model
{
    use HasFactory;
    
    protected $table = 'horarios';
    protected $primaryKey = 'idHorario';
    
    protected $fillable = [
        'Dia',
        'HorarioInicio',
        'HorarioFin',
        'Aula'
    ];
    
    protected $casts = [
        'HorarioInicio' => 'datetime:H:i:s',
        'HorarioFin' => 'datetime:H:i:s'
    ];
    
    // Relaciones
    public function personal()
    {
        return $this->belongsToMany(Personal::class, 'horario_personal', 'idHorario', 'IdPersonal')
                    ->withTimestamps();
    }
}