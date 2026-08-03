<?php
// app/Models/Genero.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genero extends Model
{
    use HasFactory;
    
    protected $table = 'generos';
    protected $primaryKey = 'idGenero';
    
    protected $fillable = [
        'Genero'
    ];
    
    // Relaciones
    public function datosPersonales()
    {
        return $this->hasMany(DatosPersonales::class, 'idGenero', 'idGenero');
    }
}