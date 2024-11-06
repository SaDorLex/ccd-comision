<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plaza extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_convocatoria',
        'id_clasificacion',
        'horas_lectivas',
        'horas_no_lectivas',
        'horas_semanales',
        'requisitos_descripcion',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    protected $table = 'plazas'; 

    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class, 'plaza_asignatura', 'id_plaza', 'id_asignatura');
    }

    public function convocatoria()
    {
        return $this->belongsTo(Convocatoria::class, 'id_convocatoria');
    }

    public function clasificacion()
    {
        return $this->belongsTo(Clasificacion::class, 'id_clasificacion');
    }

    public function evaluacion()
    {
        return $this->hasMany(Evaluacion::class, 'id_plaza');
    }
}
