<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    public function postulacion(){
        return $this->belongsTo(Evaluacion::class, 'id_postulacion');
    }

    public function requisito(){
        return $this->belongsTo(Requisito::class, 'id_requisito');
    }
}
