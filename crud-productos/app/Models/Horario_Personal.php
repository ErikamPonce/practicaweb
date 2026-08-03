<?php
// app/Models/HorarioPersonal.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HorarioPersonal extends Model
{
    use HasFactory;
    
    protected $table = 'horario_personal';
    
    protected $fillable = [
        'idHorario',
        'IdPersonal'
    ];
    
    // Relaciones
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'idHorario', 'idHorario');
    }
    
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'IdPersonal', 'IdPersonal');
    }
}