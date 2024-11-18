<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeccionEvaluaciones extends Model
{
    use HasFactory;

    protected $table = "secciones_evaluacion";

    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class, 'id_seccion');
    }

    public function rubro()
    {
        return $this->belongsTo(Rubro::class, 'id_rubro');
    }

    public function padre()
    {
        return $this->belongsTo(SeccionEvaluaciones::class, 'id_padre');
    }

    public function hijos()
    {
        return $this->hasMany(SeccionEvaluaciones::class, 'id_padre');
    }
}
