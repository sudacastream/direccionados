<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InletController extends Controller
{
    public function index(Request $request)
    {
        if($request->user()['email'] == 'ceo@sudacastream.com' || $request->user()['email'] == 'congreso@direccionados.ar')
        {
            return view('inlet.index');
        }
        else
        {
            return abort(404);
        }
    }
    public function search(Request $request)
    {
        if(str_contains($request->token, '@'))
        {
            $cadena = explode('@', $request->token);
            $dni = DB::table('tickets')->where('dni','=',$cadena[4])->get();
            return $dni;
        }
        else if(str_contains($request->token, '-'))
        {
            $token = DB::table('tickets')->where('token','=',$request->token)->get();
            return $token;
        }
        else
        {
            $token = DB::table('tickets')->where('dni','=',$request->token)->get();
            return $token;
        }
    }
    public function asistencia(Request $request)
    {
        if($request->checked == 'true')
        {
            DB::table('tickets')->where('id','=',$request->id)->update(['asistencia'=>true, 'updated_at'=>Carbon::now()]);
        }
        else
        {
            DB::table('tickets')->where('id','=',$request->id)->update(['asistencia'=>false, 'updated_at'=>Carbon::now()]);
        }
    }
}
