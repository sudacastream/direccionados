<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function index(Request $request)
    {
        if($request->user()['email'] == 'ceo@sudacastream.com' || $request->user()['email'] == 'nahufidelibus@gmail.com')
        {
            $totales = DB::table('tickets')->get();
            $presentes = DB::table('tickets')->where('asistencia','=',true)->get();
            $combos = DB::table('buffet')->get();
            $totalCombos = 0;
            foreach($combos as $combo)
            {
                $totalCombos += $combo->cantidad;
            }
            $combosEntregados = DB::table('buffet')->where('retiro','=',true)->get();
            $totalCombosEntregados = 0;
            foreach($combosEntregados as $entregado)
            {
                $totalCombosEntregados += $entregado->cantidad;
            }
            $ingresantes = DB::table('tickets')->where('asistencia','=',true)->orderByDesc('updated_at')->get();

            return view('admin.stats', [
                'user' => $request->user(),
                'totales' => $totales,
                'presentes' => $presentes,
                'totalCombos' => $totalCombos,
                'combosEntregados' => $totalCombosEntregados,
                'ingresantes' => $ingresantes,
            ]);
        }
        else
        {
            return abort(404);
        }
    }
}
