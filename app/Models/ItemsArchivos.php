<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsArchivos extends Model
{
    use HasFactory;

    protected $table = "items_archivos";

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $fillable = [
        'nombre',
        'tipo_carpeta'
    ];

    public function convocatoria()
    {
        return $this->belongsToMany(Convocatoria::class, 'requisitos', 'id_item', 'id_convocatoria');
    }
}
