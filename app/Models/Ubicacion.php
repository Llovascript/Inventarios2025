<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    protected $table = 'ubicacion';

    protected $fillable = [
        'descripcion',
        'id_edificio',
        'id_planta',
        'id_area',
    ];

    public function edificio()
    {
        return $this->belongsTo(Edificio::class, 'id_edificio');
    }

    public function planta()
    {
        return $this->belongsTo(Planta::class, 'id_planta');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }
}
