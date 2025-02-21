<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    // Relación con la tabla de usuarios
    public function users()
    {
        return $this->hasMany(User::class, 'id_role');
    }
}