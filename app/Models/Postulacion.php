<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    use HasFactory;

    protected $table = "postulaciones";

    public function postulante()
    {
        return $this->belongsTo(Postulante::class, 'id_postulante');
    }

    public function pago()
    {
        return $this->belongsTo(Pago::class, 'id_pago');
    }

    public function plaza()
    {
        return $this->belongsTo(Plaza::class, 'id_plaza');
    }

    public function archivos()
    {
        return $this->hasMany(Archivo::class, 'id_postulacion');
    }

    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class, 'id_postulacion');
    }
}
