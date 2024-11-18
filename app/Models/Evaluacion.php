<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    protected $table = "evaluacion_merito";

    public function postulacion()
    {
        return $this->belongsTo(Postulacion::class, 'id_postulacion');
    }

    public function seccion()
    {
        return $this->belongsTo(SeccionEvaluaciones::class, 'id_seccion');
    }
}
