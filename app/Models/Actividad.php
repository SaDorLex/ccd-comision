<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    protected $table = 'actividades'; 

    public function convocatoria()
    {
        return $this->belongsToMany(Convocatoria::class, 'convocatoria_actidad', 'id_actividad', 'id_convocatoria')->withPivot('fecha_inicio', 'fecha_termino');
    }
}
