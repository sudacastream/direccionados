<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $token = DB::table('tickets')->where('token','=',$request->token)->get();
        return $token;
    }
    public function asistencia(Request $request)
    {
        if($request->checked == 'true')
        {
            DB::table('tickets')->where('id','=',$request->id)->update(['asistencia'=>true]);
        }
        else
        {
            DB::table('tickets')->where('id','=',$request->id)->update(['asistencia'=>false]);
        }
    }
}
