<?php
// app/Models/Escuela.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Escuela extends Model
{
    use HasFactory;
    
    protected $table = 'escuelas';
    protected $primaryKey = 'CCT';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'CCT',
        'Nombre',
        'Telefono',
        'Email',
        'Calle',
        'NumE',
        'idLocalidad',
        'idMunicipio',
        'idEstado',
        'CP'
    ];
    
    // Relaciones
    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'idLocalidad', 'idLocalidad');
    }
    
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'idMunicipio', 'idMunicipio');
    }
    
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'idEstado', 'idEstado');
    }
    
    // Métodos
    public function registrarEscuela()
    {
        return $this->save();
    }
    
    public function mostrarDatos()
    {
        return [
            'CCT' => $this->CCT,
            'Nombre' => $this->Nombre,
            'Telefono' => $this->Telefono,
            'Email' => $this->Email,
            'Direccion' => "{$this->Calle} {$this->NumE}, CP {$this->CP}",
            'Localidad' => $this->localidad?->Nombre,
            'Municipio' => $this->municipio?->Nombre,
            'Estado' => $this->estado?->Nombre
        ];
    }
    
    public function eliminarEsc()
    {
        return $this->delete();
    }
    
    public function actualizarDatos(array $datos)
    {
        return $this->update($datos);
    }
}