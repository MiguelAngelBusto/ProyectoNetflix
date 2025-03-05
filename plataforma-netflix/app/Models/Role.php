<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Especificamos la tabla si no sigue la convención de Laravel
    protected $table = 'roles';

    // Definimos los campos que se pueden asignar de forma masiva
    protected $fillable = ['name'];

    /**
     * Relación: Un rol puede tener muchos usuarios.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

