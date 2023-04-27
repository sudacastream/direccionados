<?php

namespace App\Http\Controllers;

use App\Mail\CambioPrecio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailAvisoNuevoPrecioController extends Controller
{
    public function index(Request $request)
    {
        $listado = DB::table('tickets')->where('pago','=',false)->get();
        $listadoMorosos = DB::table('tickets')->where('pago','=',false)->distinct()->pluck('usuario');
        return view('admin.advice', [
            'listado' => $listado,
            'morosos' => $listadoMorosos,
        ]);
    }
    public function send(Request $request)
    {
        $listadoMorosos = DB::table('tickets')->where('pago','=',false)->distinct()->pluck('usuario');

        foreach($listadoMorosos as $moroso)
        {
            $usuario = DB::table('users')->where('id','=',$moroso)->get();
            Mail::to($usuario[0]->email)->send(new CambioPrecio());
        }
    }
}
