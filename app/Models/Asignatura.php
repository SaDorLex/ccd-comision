<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    protected $table = 'asignaturas';

    public function plazas(){
        return $this->belongsToMany(Plaza::class, 'plaza_asignatura', 'id_asignatura', 'id_plaza');
    }

    public function depAcad(){
        return $this->belongsTo(DepartamentoAcademico::class, 'id_departamento');
    }
}
