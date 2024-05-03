<?php

namespace App\Http\Controllers;

use App\Mail\AvisoDeEliminacion;
use App\Mail\CambioPrecio;
use Carbon\Carbon;
use Hamcrest\Type\IsInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Type\Integer;

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
        DB::table('tickets')->where('token','=',$request->tokenPass)->update(['updated_at'=>Carbon::now()]);
        $moroso = DB::table('tickets')->where('token','=',$request->tokenPass)->distinct()->pluck('usuario');
        $usuario = DB::table('users')->where('id','=',$moroso[0])->get();
        $email = $usuario[0]->email;
        Mail::to($email)->send(new CambioPrecio());
        return to_route('advice')->with('status', 'Aviso enviado a '.$email.'.');
    }
    public function destroy(Request $request)
    {
        $moroso = DB::table('tickets')->where('token','=',$request->tokenPass)->distinct()->pluck('usuario');
        $usuario = DB::table('users')->where('id','=',$moroso[0])->get();
        $email = $usuario[0]->email;

        $eliminados = DB::table('tickets')->where('token','=',$request->tokenPass)->get();

        $contenido = '<ul>';
        foreach($eliminados as $eliminado)
        {
            $contenido .= '<li>Ticket: '.$eliminado->nombres.' '.$eliminado->apellidos.' ('.$eliminado->dni.').</li>';
        }
        $contenido .= '</ul>';
        
        DB::table('tickets')->where('token','=',$request->tokenPass)->delete();
        Mail::to($email)->send(new AvisoDeEliminacion($contenido));
        return to_route('advice')->with('status', 'Los tickets con el Token Pass '.$request->tokenPass.' han sido eliminados.');
    }
}
