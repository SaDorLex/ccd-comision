<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentoAcademico extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    protected $table = 'departamentos_academicos'; 

    public function facultad(){
        return $this->belongsTo(Facultad::class, 'codigo', 'codigo_facultad');
    }
}
