<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    use HasFactory;

    protected $table = "requisitos";

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function archivos(){
        return $this->hasMany(Archivo::class, 'id_requisito');
    }

    public function itemArchivo(){
        return $this->belongsTo(ItemsArchivos::class, 'id_item');
    }
}
