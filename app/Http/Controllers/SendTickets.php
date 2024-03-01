<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Milon\Barcode\DNS2D;

class SendTickets extends Controller
{
    public function index(Request $request)
    {
        if($request->user()['email'] == 'ceo@sudacastream.com' || $request->user()['email'] == 'nahufidelibus@gmail.com')
        {
            $tokens = DB::table('tickets')->where('pago','=',true)->distinct()->pluck('token');
            $tokensTicket = DB::table('tickets')->where('pago','=',true)->distinct()->pluck('token');
            $tokensBuffet = DB::table('buffet')->where('pago','=',true)->distinct()->pluck('token');
            $tokensMerchandising = DB::table('merchandising')->where('pago','=',true)->distinct()->pluck('token');
            
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
            
            $tickets = DB::table('tickets')->where('pago','=',true)->get();

            $buffet = DB::table('buffet')->where('pago','=',true)->get();

            $merchandising = DB::table('merchandising')->where('pago','=',true)->get();

            $usuarios = DB::table('users')->get();

            return view('admin.send-ticket', [
                'tokens' => $tokens,
                'tokensTicket' => $tokensTicket,
                'tokensBuffet' =>$tokensBuffet,
                'tokensMerchandising' => $tokensMerchandising,
                'tickets' => $tickets,
                'buffet' => $buffet,
                'merchandising' => $merchandising,
                'usuarios' => $usuarios,
            ]);
        }
        else
        {
            return abort(404);
        }
    }
    public function send(Request $request)
    {
        $tokens = DB::table('tickets')->where('pago','=',true)->distinct()->pluck('token');

        $details = '';
        $tipo = 'general';
        $usuario = '';
        foreach($tokens as $token)
        {
            $tickets = DB::table('tickets')->where('token','=',$token)->get();

            foreach($tickets as $ticket)
            {
                if($ticket->precio > 4500)
                {
                    $tipo = 'general';
                }
                else
                {
                    $tipo = 'preventa';
                }
                $usuario = $ticket->usuario;
            }
            $d = new DNS2D();
            $d->setStorPath(__DIR__.'/cache/');
            $code = $d->getBarcodePNG($token,'PDF417',2,0.5);
    
            $data = [
                'code' => $code,
                'token' => $token,
                'tipo' => $tipo
            ];
            $customPaper = array(0,0,396.85,198.425);
            $pdf = Pdf::loadView('pdf.ticket-pdf', $data)->setPaper($customPaper, 'landscape');

            $mailData = '<ul>';
            foreach($tickets as $ticket)
            {
                $mailData .= '<li>Ticket: '.$ticket->nombres.' '.$ticket->apellidos.' ('.$ticket->dni.')</li>';
            }
            $mailData .= '</ul>';

            $usuario = DB::table('users')->where('id','=',$usuario)->get();
            $data["email"] = $usuario[0]->email;
            $data["title"] = "Reenvío - Tu pase para el Congreso Direccionados - ".$token;
            $data["body"] = $mailData;
            $data["token"] = $token;

            Mail::send('emails.envio-ticket', $data, function($message) use($data, $pdf) {
                $message->to($data["email"])
                        ->subject("Reenvío - Tu pase para el Congreso Direccionados - ".$data["token"])
                        ->attachData($pdf->output(), $data["token"].".pdf");
            });
            $mailData = '';
        }
    }
    public function sendTicket(Request $request)
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
            $tipo = 'general';

            foreach($tickets as $ticket)
            {
                if($ticket->precio > 4500)
                {
                    $tipo = 'general';
                }
                else
                {
                    $tipo = 'preventa';
                }
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

            Mail::send('emails.correccion-envio-ticket', $data, function($message) use($data, $pdf) {
                $message->to($data["email"])
                        ->subject("Tu pase para el Congreso Direccionados - Token Pass ".$data["token"])
                        ->attachData($pdf->output(), $data["token"].".pdf");
            });
            $mailData = '';
            return '¡Enviado!';
        }
        else
        {
            return 'El token '.$token.' no existe.';
        }
    }
    public function getTicket($token)
    {
        $tickets = DB::table('tickets')->where('token','=',$token)->get();
        if(count($tickets) > 0)
        {
            $details = '';
            $tipo = 'preventa';

            foreach($tickets as $ticket)
            {
                if($ticket->precio > 4500)
                {
                    $tipo = 'general';
                }
                else
                {
                    $tipo = 'preventa';
                }
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
            return $pdf->stream();
        }
        else
        {
            return 'El token '.$token.' no existe.';
        }
    }
}
