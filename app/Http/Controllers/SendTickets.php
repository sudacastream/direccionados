<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
}
