<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;

    protected $table = 'facultades';

    public function depAcad(){
        return $this->hasMany(DepartamentoAcademico::class, 'codigo_facultad', 'codigo');
    }
}
