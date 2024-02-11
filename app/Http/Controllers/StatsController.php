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
            $pagos = DB::table('tickets')->where('pago','=',true)->get();
            $ingresantes = DB::table('tickets')->where('pago','=',true)->orderByDesc('updated_at')->get();

            return view('admin.stats', [
                'user' => $request->user(),
                'totales' => $totales,
                'pagos' => $pagos,
                'ingresantes' => $ingresantes,
            ]);
        }
        else
        {
            return abort(404);
        }
    }
}
