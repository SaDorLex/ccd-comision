<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;

    public function distrito(){
        return $this->belongsTo(Distrito::class, 'id_distrito');
    }

    public function provincia(){
        return $this->belongsTo(Provincia::class, 'id_provincia');
    }

    public function departamento(){
        return $this->belongsTo(Departamento::class, 'id_departamento');
    }

    public function pais(){
        return $this->belongsTo(Pais::class, 'id_pais');
    }
}
