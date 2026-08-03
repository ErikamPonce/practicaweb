<?php
// app/Models/DatosPersonales.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DatosPersonales extends Model
{
    use HasFactory;
    
    protected $table = 'datos_personales';
    protected $primaryKey = 'IdDatosP';
    
    protected $fillable = [
        'Nombre',
        'ApellidoPaterno',
        'ApellidoMaterno',
        'FechaNacimiento',
        'idGenero',
        'Telefono',
        'Email',
        'Calle',
        'NumE',
        'idLocalidad',
        'CP'
    ];
    
    protected $casts = [
        'FechaNacimiento' => 'date'
    ];
    
    // Relaciones
    public function genero()
    {
        return $this->belongsTo(Genero::class, 'idGenero', 'idGenero');
    }
    
    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'idLocalidad', 'idLocalidad');
    }
    
    public function alumno()
    {
        return $this->hasOne(Alumno::class, 'IdDatosP', 'IdDatosP');
    }
    
    public function personal()
    {
        return $this->hasOne(Personal::class, 'IdDatosP', 'IdDatosP');
    }
    
    // Método para obtener nombre completo
    public function getNombreCompletoAttribute()
    {
        return "{$this->Nombre} {$this->ApellidoPaterno} {$this->ApellidoMaterno}";
    }
}