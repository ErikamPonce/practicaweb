<?php
// app/Models/Localidad.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Localidad extends Model
{
    use HasFactory;
    
    protected $table = 'localidades';
    protected $primaryKey = 'idLocalidad';
    
    protected $fillable = [
        'Nombre',
        'IdMunicipio'
    ];
    
    // Relaciones
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'IdMunicipio', 'idMunicipio');
    }
    
    public function escuelas()
    {
        return $this->hasMany(Escuela::class, 'idLocalidad', 'idLocalidad');
    }
    
    public function datosPersonales()
    {
        return $this->hasMany(DatosPersonales::class, 'idLocalidad', 'idLocalidad');
    }
}