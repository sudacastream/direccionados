<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

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
        foreach($tokens as $token)
        {
            $tickets = DB::table('tickets')->where('token','=',$token)->get();
            $buffet = DB::table('buffet')->where('token','=',$token)->get();
            $merchandising = DB::table('merchandising')->where('token','=',$token)->get();

            foreach($tickets as $ticket)
            {
                echo $ticket->token.' - '.$ticket->nombres.'</br>';
            }
            foreach($buffet as $combo)
            {
                echo $combo->token.' - '.$combo->cantidad;
                if($combo->cantidad > 1)
                {
                    echo ' combos</br>';
                }
                else
                {
                    echo ' combo</br>';
                }
            }
            foreach($merchandising as $merch)
            {
                echo $merch->token.' - '.$merch->cantidad.' '.$merch->producto.'</br>';
            }
            echo '</br>';
        }
        $data = [
            'titulo' => 'TICKET'
        ];
        $customPaper = array(0,0,396.85,198.425);
        $pdf = Pdf::loadView('pdf.ticket-pdf', $data)->setPaper($customPaper, 'landscape');
        return $pdf->stream('archivo.pdf');
    }
}
