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
        $montoTotal = 0;
        foreach($listadoMorosos as $moroso)
        {
            $tokens = DB::table('tickets')->where('usuario','=',$moroso)->where('precio','=','1499')->where('pago','=',false)->distinct()->pluck('token');
            if(count($tokens) > 0)
            {
                foreach($tokens as $token)
                {
                    $contenido .= '<span style="font-weight:600;">Token Pass: '.$token.'</span><ul></ul>';
                    $contenido .= '<span style="font-weight:600;">Detalle de la compra:</span><ul style="margin-top:5px;">';
                    $db = DB::table('tickets')->where('token','=',$token)->get();
                    foreach($db as $ticket)
                    {
                        $contenido .= '<li>Ticket: '.$ticket->nombres.' '.$ticket->apellidos.' ('.$ticket->dni.') - <span>$'.$ticket->precio.'</span>.</li>';
                        $montoTotal = $montoTotal + $ticket->precio;
                    }
                    $contenido .= '</br>';
                    $contenido .= '</ul><span style="font-weight:600;">Monto total: $'.$montoTotal.'</span><ul></ul>';
                    $contenido .= '<span style="font-weight:600;">Cuenta a transferir:</span><ul style="margin-top:5px;list-style:none;">';
                    $contenido .= '<li>Titular: Gastón Eugenio Fidelibus</li><li>CVU: 0000003100021237935253</li><li>Alias: direccionados23</li><li>CUIT/CUIL: 20214537460</li><li>Mercado Pago</li></ul>';
                    $contenido .= '</br></br></br>';
                    $montoTotal = 0;
                }
            }
            echo $contenido;
            $contenido = '';
        }
        // Mail::to($email)->send(new ConfirmacionPago($request->token));
    }
}
