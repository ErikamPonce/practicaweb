<?php
// app/Models/Personal.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personal extends Model
{
    use HasFactory;
    
    protected $table = 'personal';
    protected $primaryKey = 'IdPersonal';
    
    protected $fillable = [
        'IdDatosP',
        'IdTipo',
        'ClaveEmp',
        'Status'
    ];
    
    protected $casts = [
        'Status' => 'boolean'
    ];
    
    // Relaciones
    public function datosPersonales()
    {
        return $this->belongsTo(DatosPersonales::class, 'IdDatosP', 'IdDatosP');
    }
    
    public function tipo()
    {
        return $this->belongsTo(TipoPersonal::class, 'IdTipo', 'idTipo');
    }
    
    public function horarios()
    {
        return $this->belongsToMany(Horario::class, 'horario_personal', 'IdPersonal', 'idHorario')
                    ->withTimestamps();
    }
}