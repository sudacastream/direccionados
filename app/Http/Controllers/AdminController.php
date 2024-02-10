<?php

namespace App\Http\Controllers;

use App\Mail\CompraEfectuada;
use App\Mail\ConfirmacionPago;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Milon\Barcode\DNS2D;

class AdminController extends Controller
{
    public function edit(Request $request): View
    {
        if($request->user()['email'] == 'ceo@sudacastream.com' || $request->user()['email'] == 'nahufidelibus@gmail.com')
        {
            $tokens = DB::table('tickets')->distinct()->pluck('token');
            $tokensTicket = DB::table('tickets')->distinct()->pluck('token');
            $tokensBuffet = DB::table('buffet')->distinct()->pluck('token');
            $tokensMerchandising = DB::table('merchandising')->distinct()->pluck('token');
            
            for($i=0;$i < count($tokensBuffet);$i++)
            {
                if(! $tokens->contains($tokensBuffet[$i]))
                {
                    $tokens->push($tokensBuffet[$i]);
                }
            }
            for($i=0;$i < count($tokensMerchandising);$i++)
            {
                if(! $tokens->contains($tokensMerchandising[$i]))
                {
                    $tokens->push($tokensMerchandising[$i]);
                }
            }

            $tickets = DB::table('tickets')->get()->groupBy('token');

            $buffet = DB::table('buffet')->get()->groupBy('token');

            $merchandising = DB::table('merchandising')->get()->groupBy('token');

            return view('admin.tokens', [
                'tokens' => $tokens,
                'tokensTicket' => $tokensTicket,
                'tickets' => $tickets,
                'tokensBuffet' =>$tokensBuffet,
                'buffet' => $buffet,
                'tokensMerchandising' => $tokensMerchandising,
                'merchandising' => $merchandising,
                'user' => $request->user(),
            ]);
        }
        else
        {
            return abort(404);
        }
    }
    public function search(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);

        
        $tickets = DB::table('tickets')->where('token', '=', $request->token)->get();

        $buffet = DB::table('buffet')->where('token', '=', $request->token)->get();

        $merchandising = DB::table('merchandising')->where('token', '=', $request->token)->get();

        return view('admin.tokens', [
            'token' => $request->token,
            'tickets' => $tickets,
            'buffet' => $buffet,
            'merchandising' => $merchandising,
            'user' => $request->user(),
        ]);
    }
    public function ticket(Request $request)
    {
        if(is_numeric($request->ticket))
        {
            $tickets = DB::table('tickets')->where('dni','=',$request->ticket)->get();
        }
        else
        {
            $tickets = DB::table('tickets')->where('apellidos','ILIKE','%'.$request->ticket.'%')->orWhere('nombres','ILIKE','%'.$request->ticket.'%')->get();
        }
        return view('admin.tickets',[
            'tickets' => $tickets,
            'ticket' => $tickets[0]->dni,
        ]);
    }
    public function paid(Request $request)
    {
        if(count(DB::table('tickets')->where('token', '=', $request->token)->get()) > 0)
        {
            DB::table('tickets')->where('token', '=', $request->token)->update(['pago' => true]);
            $user = DB::table('tickets')->where('token', '=', $request->token)->get();

        }
        
        $u = DB::table('users')->where('id','=',$user[0]->usuario)->get();

        $email = $u[0]->email;
        $token = $request->token;

        $tickets = DB::table('tickets')->where('token','=',$token)->get();
        if(count($tickets) > 0)
        {
            $details = '';
            $tipo = 'preventa';

            foreach($tickets as $ticket)
            {
                /*if($ticket->precio > 4500)
                {
                    $tipo = 'general';
                }
                else
                {
                    $tipo = 'preventa';
                }*/
                $usuario = $ticket->usuario;
            }
            $details .= 'Presentar en puerta para ingresar';

            $d = new DNS2D();
            $d->setStorPath(__DIR__.'/cache/');
            $code = $d->getBarcodePNG($token,'PDF417',2,0.5);
    
            $data = [
                'code' => $code,
                'token' => $token,
                'details' => $details,
                'tipo' => $tipo,
                'url' => env('APP_URL'),
            ];
            $customPaper = array(0,0,396.85,198.425);
            $pdf = Pdf::loadView('pdf.ticket-pdf', $data)->setPaper($customPaper, 'landscape');
            $details = '';

            $mailData = '<ul>';
            $esCombo = 0;
            foreach($tickets as $ticket)
            {
                if($ticket->combo == 1)
                {
                    $mailData .= '<li>Ticket y Remera: '.$ticket->nombres.' '.$ticket->apellidos.' ('.$ticket->dni.')</li>';
                    $esCombo++;
                }
                else
                {
                    $mailData .= '<li>Ticket: '.$ticket->nombres.' '.$ticket->apellidos.' ('.$ticket->dni.')</li>';
                }
            }
            if($esCombo > 0)
            {
                $productoAdquirido = 'tickets y remeras';
            }
            else
            {
                $productoAdquirido = 'tickets';
            }

            $mailData .= '</ul>';

            $usuario = DB::table('users')->where('id','=',$usuario)->get();
            $data["email"] = $usuario[0]->email;
            $data["title"] = "Tu ticket para el Congreso Direccionados - ".$token;
            $data["body"] = $mailData;
            $data["token"] = $token;
            $data["productoAdquirido"] = $productoAdquirido;

            Mail::send('emails.envio-ticket', $data, function($message) use($data, $pdf) {
                $message->to($data["email"])
                        ->subject("¡Pago recibido! Tu pase para el Congreso Direccionados - Token Pass ".$data["token"])
                        ->attachData($pdf->output(), $data["token"].".pdf");
            });
            $mailData = '';
        }

        return view('admin.tokens',[
            'token' => $request->token,
            'tickets' => $tickets,
            'user' => $request->user(),
        ]);
    }
    public function redirect(Request $request)
    {
        if($request->user()['email'] == 'ceo@sudacastream.com' || $request->user()['email'] == 'nahufidelibus@gmail.com')
        {
        return to_route('admin.tokens');
        }
        else
        {
            return abort(404);
        }
    }
    public function list(Request $request)
    {
        if($request->user()['email'] == 'ceo@sudacastream.com' || $request->user()['email'] == 'nahufidelibus@gmail.com')
        {
            $ticketsPagos = DB::table('tickets')->orderBy('apellidos')->orderBy('asistencia')->get();
            return view('admin.list',[
                'user' => $request->user(),
                'pagos' => $ticketsPagos,
            ]);
        }
        else
        {
            return abort(404);
        }
    }
    public function pastors(Request $request)
    {
        if($request->user()['email'] == 'ceo@sudacastream.com' || $request->user()['email'] == 'nahufidelibus@gmail.com')
        {
            $pastores = DB::table('tickets')->where('funcion','=','pastor')->orderBy('apellidos')->get();
            return view('admin.pastores',[
                'user' => $request->user(),
                'pagos' => $pastores,
            ]);
        }
        else
        {
            return abort(404);
        }
    }
}
