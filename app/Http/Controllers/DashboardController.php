<?php

namespace App\Http\Controllers;

use App\Models\Convocatoria;
use App\Models\Postulacion;
use App\Models\Plaza;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        $cantC = Convocatoria::all()->count();

        $cantP = Plaza::all()->count();

        $cantE = Postulacion::all()->count();

        $cantEC = Postulacion::where('estado', 2)->count();

        return view('dashboard', compact('cantC', 'cantP', 'cantE', 'cantEC'));
    }
}
