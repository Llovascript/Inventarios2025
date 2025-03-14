<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    use HasFactory;

    protected $table = 'plantas';

    public function ubicaciones(){
        return $this->hasMany(Ubicacion::class, 'id_planta');
    }
}
