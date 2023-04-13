<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailAvisoNuevoPrecioController extends Controller
{
    public function index(Request $request)
    {
        $listado = DB::table('tickets')->where('precio','=','1499')->where('pago','=',false)->get();
        $listadoMorosos = DB::table('tickets')->where('precio','=','1499')->where('pago','=',false)->distinct()->pluck('usuario');
        return view('admin.advice', [
            'listado' => $listado,
            'morosos' => $listadoMorosos,
        ]);
    }
    public function send(Request $request)
    {
        $listadoMorosos = DB::table('tickets')->where('precio','=','1499')->where('pago','=',false)->distinct()->pluck('usuario');

        $contenido = '';
        foreach($listadoMorosos as $moroso)
        {
            $token = DB::table('tickets')->where('usuario','=',$moroso)->where('precio','=','1499')->where('pago','=',false)->distinct()->pluck('token');
            foreach($tickets as $ticket)
            {
                $contenido .= $ticket->nombres.'<br/>';
                $contenido .= $ticket->token.'<br/>';
            }        
            $montoTotal = '3291';
                
            $contenido .= '</ul><span style="font-weight:600;">Monto total: $'.$montoTotal.'</span><ul></ul>';
            $contenido .= '<span style="font-weight:600;">Cuenta a transferir:</span><ul style="margin-top:5px;list-style:none;">';
            $contenido .= '<li>Titular: Gastón Eugenio Fidelibus</li><li>CVU: 0000003100021237935253</li><li>Alias: direccionados23</li><li>CUIT/CUIL: 20214537460</li><li>Mercado Pago</li></ul>';
            echo $contenido;
        }
        // Mail::to($email)->send(new ConfirmacionPago($request->token));
    }
}
