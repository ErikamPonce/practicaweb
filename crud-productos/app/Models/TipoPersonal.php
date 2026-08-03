<?php
// app/Models/TipoPersonal.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoPersonal extends Model
{
    use HasFactory;
    
    protected $table = 'tipos_personal';
    protected $primaryKey = 'idTipo';
    
    protected $fillable = [
        'Nombre'
    ];
    
    // Relaciones
    public function personal()
    {
        return $this->hasMany(Personal::class, 'IdTipo', 'idTipo');
    }
}