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
    public function send(Request $request)
    {
        $tokens = DB::table('tickets')->where('pago','=',true)->distinct()->pluck('token');
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

        $details = '';
        $tipo = 'general';
        $usuario = '';
        foreach($tokens as $token)
        {
            $tickets = DB::table('tickets')->where('token','=',$token)->get();
            $buffet = DB::table('buffet')->where('token','=',$token)->get();
            $merchandising = DB::table('merchandising')->where('token','=',$token)->get();

            foreach($tickets as $ticket)
            {
                if($ticket->precio > 1500)
                {
                    $tipo = 'general';
                }
                else
                {
                    $tipo = 'preventa';
                }
                $usuario = $ticket->usuario;
            }
            if(count($tickets) == 1)
            {
                $details .= 'Ticket: 1 ticket';
            }
            elseif(count($tickets) > 1)
            {
                $details .= 'Tickets: '.count($tickets).' tickets';
            }
            if(count($tickets) > 0 && count($buffet) > 0)
            {
                $details .= ' | ';
            }
            foreach($buffet as $combo)
            {
                $details .= 'Buffet: '.$combo->cantidad;
                if($combo->cantidad > 1)
                {
                    $details .= ' combos';
                }
                else
                {
                    $details .= ' combo';
                }
                $usuario = $combo->usuario;
            }
            if(count($tickets) > 0 || count($buffet) > 0 && count($merchandising) > 0)
            {
                $details .= ' | ';
            }
            if(count($merchandising) > 0)
            {
                $details .= 'Merchandising:';
            }
            $i = 1;
            foreach($merchandising as $merch)
            {
                $details .= ' '.$merch->cantidad.' '.$merch->producto;
                if(count($merchandising) > 1 && $i == 1)
                {
                    $details .= ' y';
                }
                $i++;
                $usuario = $merch->usuario;
            }
            $d = new DNS2D();
            $d->setStorPath(__DIR__.'/cache/');
            $code = $d->getBarcodePNG($token,'PDF417',2,0.5);
    
            $data = [
                'code' => $code,
                'token' => $token,
                'details' => $details,
                'tipo' => $tipo
            ];
            $customPaper = array(0,0,396.85,198.425);
            $pdf = Pdf::loadView('pdf.ticket-pdf', $data)->setPaper($customPaper, 'landscape');
            $details = '';

            $mailData = '<ul>';
            foreach($tickets as $ticket)
            {
                $mailData .= '<li>Ticket: '.$ticket->nombres.' '.$ticket->apellidos.' ('.$ticket->dni.')</li>';
            }
            foreach($buffet as $combo)
            {
                $mailData .= '<li>Buffet: '.$combo->cantidad;
                if($combo->cantidad > 1)
                {
                    $mailData .= ' combos</li>';
                }
                else
                {
                    $mailData .= ' combo</li>';
                }
            }
            foreach($merchandising as $merch)
            {
                $mailData .= '<li>Merchandising: '.$merch->cantidad.' '.$merch->producto.'</li>';
            }
            $mailData .= '</ul>';

            $usuario = DB::table('users')->where('id','=',$usuario)->get();
            $data["email"] = $usuario[0]->email;
            $data["title"] = "Tu ticket para el Congreso Direccionados - ".$token;
            $data["body"] = $mailData;
            $data["token"] = $token;

            Mail::send('emails.envio-ticket', $data, function($message) use($data, $pdf) {
                $message->to($data["email"])
                        ->subject("Tu pase para el Congreso Direccionados - ".$data["token"])
                        ->attachData($pdf->output(), $data["token"].".pdf");
            });
            $mailData = '';
        }
    }
}
