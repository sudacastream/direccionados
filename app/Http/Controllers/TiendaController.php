<?php

namespace App\Http\Controllers;

use App\Models\Buffet;
use App\Models\Merchandising;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\Ticket;

class TiendaController extends Controller
{
    public function edit(Request $request): View
    {
        $id = strval($request->user()['id']);

        return view('tickets', [
            'precioTicket' => DB::table('precios')->where('producto', 'ticket')->value('precio'),
            'precioBuffet' => DB::table('precios')->where('producto', 'buffet')->value('precio'),
            'comboDescripcion' => DB::table('precios')->where('producto', 'buffet')->value('descripcion'),
            'precioRemera' => DB::table('precios')->where('producto', 'remera')->value('precio'),
            'remeraDescripcion' => DB::table('precios')->where('producto', 'remera')->value('descripcion'),
            'precioGorra' => DB::table('precios')->where('producto', 'gorra')->value('precio'),
            'gorraDescripcion' => DB::table('precios')->where('producto', 'gorra')->value('descripcion'),
            'tokens' => DB::table('tickets')->where('usuario', '=', $id)->distinct()->pluck('token'),            
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
        $request['precioBuffet'] = DB::table('precios')->where('producto', 'buffet')->value('precio');
        $request['precioRemera'] = DB::table('precios')->where('producto', 'remera')->value('precio');
        $request['precioGorra'] = DB::table('precios')->where('producto', 'gorra')->value('precio');
        $request['pago'] = 0;
        $request['asistencia'] = 0;
        
        if($request->nombres)
        {
            $lenght = count($request->nombres);
            for( $i = 0 ; $i <= $lenght-1 ; $i++)
            {
                $nombres = $request['nombres'];
                $apellidos = $request['apellidos'];
                $dni = $request['dni'];
                $funcion = $request['funcion'];

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
                $ticket->precio = $request['precio'];
                $ticket->pago = $request['pago'];
                $ticket->save();
            }
        }

        if($request['cantidadBuffet'] > 0)
        {
            $buffet = new Buffet();
            $buffet->usuario = $request['usuario'];
            $buffet->token = $request['token'];
            $buffet->cantidad = $request['cantidadBuffet'];
            $buffet->precio = $request['precioBuffet'];
            $buffet->pago = $request['pago'];
            $buffet->retiro = $request['pago'];
            $buffet->save();
        }

        if($request['cantidadRemera'] > 0)
        {
            $remeras = new Merchandising();
            $remeras->usuario = $request['usuario'];
            $remeras->token = $request['token'];
            if($request['cantidadRemera'] > 1)
            {
                $remeras->producto = 'remeras';
            }
            else
            {
                $remeras->producto = 'remera';
            }
            $remeras->cantidad = $request['cantidadRemera'];
            $remeras->precio = $request['precioRemera'];
            $remeras->pago = $request['pago'];
            $remeras->save();
        }
        if($request['cantidadGorra'] > 0)
        {
            $gorras = new Merchandising();
            $gorras->usuario = $request['usuario'];
            $gorras->token = $request['token'];
            if($request['cantidadGorra'] > 1)
            {
                $gorras->producto = 'gorras';
            }
            else
            {
                $gorras->producto = 'gorra';
            }
            $gorras->cantidad = $request['cantidadGorra'];
            $gorras->precio = $request['precioGorra'];
            $gorras->pago = $request['pago'];
            $gorras->save();
        }

        return to_route('dashboard');
    }
}
