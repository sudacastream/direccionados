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

        $buffetPagos = DB::table('buffet')->where('pago','=',true)->get();
        $cantidadBuffetPagos = 0;
        foreach($buffetPagos as $buffet)
        {
            $cantidadBuffetPagos = $cantidadBuffetPagos + $buffet->cantidad;
        }
        $buffetImpagos = DB::table('buffet')->where('pago','=',false)->get();
        $cantidadBuffetImpagos = 0;
        foreach($buffetImpagos as $buffet)
        {
            $cantidadBuffetImpagos = $cantidadBuffetImpagos + $buffet->cantidad;
        }
        $remerasPagas = DB::table('merchandising')->where('producto','LIKE','%remera%')->where('pago','=',true)->get();
        $cantidadRemerasPagas = 0;
        foreach($remerasPagas as $remeras)
        {
            $cantidadRemerasPagas = $cantidadRemerasPagas + $remeras->cantidad;
        }
        $remerasImpagas = DB::table('merchandising')->where('producto','LIKE','%remera%')->where('pago','=',false)->get();
        $cantidadRemerasImpagas = 0;
        foreach($remerasImpagas as $remeras)
        {
            $cantidadRemerasImpagas = $cantidadRemerasImpagas + $remeras->cantidad;
        }
        $gorrasPagas = DB::table('merchandising')->where('producto','LIKE','%gorra%')->where('pago','=',true)->get();
        $cantidadGorrasPagas = 0;
        foreach($gorrasPagas as $gorras)
        {
            $cantidadGorrasPagas = $cantidadGorrasPagas + $gorras->cantidad;
        }
        $gorrasImpagas = DB::table('merchandising')->where('producto','LIKE','%gorra%')->where('pago','=',false)->get();
        $cantidadGorrasImpagas = 0;
        foreach($gorrasImpagas as $gorras)
        {
            $cantidadGorrasImpagas = $cantidadGorrasImpagas + $gorras->cantidad;
        }

        return view('admin.stats', [
            'user' => $request->user(),
            'iTotal' => $iTotal,
            'iFebrero' => $iFebrero,
            'iMarzo' => $iMarzo,
            'iAbril' => $iAbril,
            'iMayo' => $iMayo,
            'pagos' => $pagos,
            'impagos' => $impagos,
            'buffetPagos' => $cantidadBuffetPagos,
            'buffetImpagos' => $cantidadBuffetImpagos,
            'remerasPagas' => $cantidadRemerasPagas,
            'remerasImpagas' => $cantidadRemerasImpagas,
            'gorrasPagas' => $cantidadGorrasPagas,
            'gorrasImpagas' => $cantidadGorrasImpagas,
        ]);
    }
}
