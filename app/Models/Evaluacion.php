<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
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
}
