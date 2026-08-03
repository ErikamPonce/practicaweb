<?php
// app/Models/Estado.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estado extends Model
{
    use HasFactory;
    
    protected $table = 'estados';
    protected $primaryKey = 'idEstado';
    public $incrementing = true;
    
    protected $fillable = [
        'Nombre'
    ];
    
    // Relaciones
    public function municipios()
    {
        return $this->hasMany(Municipio::class, 'IdEstado', 'idEstado');
    }
    
    public function escuelas()
    {
        return $this->hasMany(Escuela::class, 'idEstado', 'idEstado');
    }
}