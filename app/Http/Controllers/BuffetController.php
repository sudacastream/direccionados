<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuffetController extends Controller
{
    public function index(Request $request)
    {
        if($request->user()['email'] == 'ceo@sudacastream.com' || $request->user()['email'] == 'congreso@direccionados.ar')
        {
            return view('buffet.index');
        }
        else
        {
            return abort(404);
        }
    }
    public function search(Request $request)
    {
        $token = DB::table('buffet')->where('token','=',$request->token)->get();
        return $token;
    }
    public function searchUsuario(Request $request)
    {
        $cadena = explode('-', $request->token);
        $usuario = $cadena[1];

        $usuario = DB::table('tickets')->where('usuario','=',$usuario)->get();
        return $usuario;
    }
    public function entrega(Request $request)
    {
        if($request->checked == 'true')
        {
            DB::table('buffet')->where('id','=',$request->id)->update(['retiro'=>true]);
        }
        else
        {
            DB::table('buffet')->where('id','=',$request->id)->update(['retiro'=>false]);
        }
    }
}
