<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    use HasFactory;

    protected $table = "rubros";

    protected $fillable = [
        'nombre',
        'puntaje',
        'tipo'
    ];

    public function secciones()
    {
        return $this->hasMany(SeccionEvaluaciones::class, 'id_rubro');
    }
}
