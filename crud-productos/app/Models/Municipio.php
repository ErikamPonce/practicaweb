<?php
// app/Models/Municipio.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Municipio extends Model
{
    use HasFactory;
    
    protected $table = 'municipios';
    protected $primaryKey = 'idMunicipio';
    
    protected $fillable = [
        'Nombre',
        'IdEstado'
    ];
    
    // Relaciones
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'IdEstado', 'idEstado');
    }
    
    public function localidades()
    {
        return $this->hasMany(Localidad::class, 'IdMunicipio', 'idMunicipio');
    }
    
    public function escuelas()
    {
        return $this->hasMany(Escuela::class, 'idMunicipio', 'idMunicipio');
    }
}