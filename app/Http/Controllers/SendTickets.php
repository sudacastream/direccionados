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
        $details = '';
        foreach($tokens as $token)
        {
            $tickets = DB::table('tickets')->where('token','=',$token)->get();
            $buffet = DB::table('buffet')->where('token','=',$token)->get();
            $merchandising = DB::table('merchandising')->where('token','=',$token)->get();

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
            }
            $d = new DNS2D();
            $d->setStorPath(__DIR__.'/cache/');
            $code = $d->getBarcodePNG($token,'PDF417',2,0.5);
    
            $data = [
                'titulo' => 'TICKET',
                'code' => $code,
                'token' => $token,
                'details' => $details
            ];
            $customPaper = array(0,0,396.85,198.425);
            $pdf = Pdf::loadView('pdf.ticket-pdf', $data)->setPaper($customPaper, 'landscape');
            return $pdf->stream('archivo.pdf');
        }
    }
}
