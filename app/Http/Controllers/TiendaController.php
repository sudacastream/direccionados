<?php

namespace App\Http\Controllers;

use App\Mail\CompraEfectuada;
use App\Mail\ConfirmacionPago;
use App\Models\Buffet;
use App\Models\Merchandising;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\Ticket;
use Illuminate\Support\Facades\Mail;

class TiendaController extends Controller
{
    public function edit(Request $request): View
    {
        $id = strval($request->user()['id']);
        
        return view('tickets', [
            'precioTicket' => DB::table('precios')->where('producto', 'ticket')->value('precio'),
            'precioCombo' => DB::table('precios')->where('producto', 'combo')->value('precio'),
            'tokens' => DB::table('tickets')->where('usuario', '=', $id)->distinct()->pluck('token'),
            'email' => $request->user()['email'],
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'unique:tickets'
        ], [
            'unique' => 'Ya existe un ticket con el mismo DNI.'
        ]);

        $request['usuario'] = $request->user()['id'];
        $request['token'] = Str::random(5);
        $request['token'] .= '-';
        $request['token'] .= strval($request->user()['id']);
        $request['precio'] = DB::table('precios')->where('producto', 'ticket')->value('precio');
        $request['precioCombo'] = DB::table('precios')->where('producto', 'combo')->value('precio');
        $request['pago'] = 0;
        $request['asistencia'] = 0;
        
        $contenido = '<span style="font-weight:600;">Token Pass: '.$request['token'].'</span><ul></ul>';
        $contenido .= '<span style="font-weight:600;">Detalle de la compra:</span><ul style="margin-top:5px;">';
        $montoTotal = 0;

        if($request->nombres)
        {
            $lenght = count($request->nombres);
            for( $i = 0 ; $i <= $lenght-1 ; $i++)
            {
                $nombres = $request['nombres'];
                $apellidos = $request['apellidos'];
                $dni = $request['dni'];
                $funcion = $request['funcion'];
                $combo = $request['combo'];

                $ticket = new Ticket();
                $ticket->usuario = $request['usuario'];
                $ticket->token = $request['token'];
                $ticket->nombres = $nombres[$i];
                $ticket->apellidos = $apellidos[$i];
                $ticket->dni = $dni[$i];
                $ticket->funcion = $funcion[$i];
                $ticket->pais = $request['pais'];
                $ticket->provincia = $request['provincia'];
                $ticket->ciudad = $request['ciudad'];
                $ticket->congregacion = $request['congregacion'];
                $ticket->pastor = $request['pastor'];
                $ticket->asistencia = $request['asistencia'];
                $ticket->combo = $combo[$i];
                if($combo[$i] == 1)
                {
                    $ticket->precio = $request['precioCombo'];
                }
                else
                {
                    $ticket->precio = $request['precio'];
                }
                $ticket->pago = $request['pago'];
                $ticket->save();
                
                if($combo[$i] == 1)
                {
                    $contenido .= '<li>Ticket y Remera: '.$nombres[$i].' '.$apellidos[$i].' ('.$dni[$i].') - <span>$'.$request['precioCombo'].'</span>.</li>';
                    $montoTotal = $montoTotal + $request['precioCombo'];
                }
                else
                {
                    $contenido .= '<li>Ticket: '.$nombres[$i].' '.$apellidos[$i].' ('.$dni[$i].') - <span>$'.$request['precio'].'</span>.</li>';
                    $montoTotal = $montoTotal + $request['precio'];
                }
            }
        }

        $contenido .= '</ul><span style="font-weight:600;">Monto total: $'.$montoTotal.'</span><ul></ul>';
        $contenido .= '<span style="font-weight:600;">Cuenta a transferir:</span><ul style="margin-top:5px;list-style:none;">';
        $contenido .= '<li>Titular: Gastón Eugenio Fidelibus</li><li>CVU: 0000003100021237935253</li><li>Alias: direccionados23</li><li>CUIT/CUIL: 20214537460</li><li>Mercado Pago</li></ul>';

        if($montoTotal > 0)
        {
            Mail::to($request->user()['email'])->send(new CompraEfectuada($contenido));
            return to_route('dashboard')->with('status', 'Hemos recibido tu pedido correctamente. Revisá tu casilla de email para abonar y confirmar el pedido.');
        }
        else
        {
            return to_route('tienda');
        }

    }
}
