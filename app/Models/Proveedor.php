<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedor';
    
    protected $fillable = [
        'nombre',
        'apellido_pat',
        'apellido_mat',
        'correo',
        'RFC',
        'razon_social',
        'tel_oficina',
        'tel_personal',
        'estatus'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
    public function getNombreCompletoAttribute()
    {
        return trim("{$this->nombre} {$this->apellido_pat} {$this->apellido_mat}");
    }
}