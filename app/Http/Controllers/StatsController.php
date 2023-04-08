<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function index(Request $request)
    {
        $iTotal = DB::table('tickets')->get();
        $iFebrero = DB::table('tickets')->whereMonth('created_at','=','02')->get();
        $iMarzo = DB::table('tickets')->whereMonth('created_at','=','03')->get();
        $iAbril = DB::table('tickets')->whereMonth('created_at','=','04')->get();
        $iMayo = DB::table('tickets')->whereMonth('created_at','=','05')->get();
        $pagos = DB::table('tickets')->where('pago','=',true)->get();
        $impagos = DB::table('tickets')->where('pago','=',false)->get();

        return view('admin.stats', [
            'user' => $request->user(),
            'iTotal' => $iTotal,
            'iFebrero' => $iFebrero,
            'iMarzo' => $iMarzo,
            'iAbril' => $iAbril,
            'iMayo' => $iMayo,
            'pagos' => $pagos,
            'impagos' => $impagos,
        ]);
    }
}
