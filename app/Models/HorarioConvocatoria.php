<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioConvocatoria extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $table = 'horario_convocatorias';

    protected $fillable = [
        'Lunes',
        'Martes',
        'Miercoles',
        'Jueves',
        'Viernes',
        'Sabado',
        'Domingo',
        'hora_inicio',
        'hora_termino',
    ];

    public function convocatoria()
    {
        return $this->hasMany(Convocatoria::class, 'id_horario');
    }
}
