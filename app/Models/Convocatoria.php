<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    protected $table = 'convocatorias';

    protected $fillable = [
        'id_semestre',
        'fecha_inicio',
        'fecha_termino',
        'base',
        'estado_pago',
        'comentarios',
        'id_horario',
        'estado'
    ];

    public function semestreAcademico()
    {
        return $this->belongsTo(SemestreAcademico::class, 'id_semestre');
    }

    public function plazas()
    {
        return $this->hasMany(Plaza::class, 'id_convocatoria');
    }

    public function horario()
    {
        return $this->belongsTo(HorarioConvocatoria::class, 'id_horario');
    }

    public function actividades()
    {
        return $this->belongsToMany(Actividad::class, 'convocatoria_actidad', 'id_convocatoria', 'id_actividad')->withPivot('fecha_inicio', 'fecha_termino');
    }

    public function itemsArchivos(){
        return $this->belongsToMany(ItemsArchivos::class, 'requisitos', 'id_convocatoria', 'id_item');
    }
}
