<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $id = strval($request->user()['id']);
        
        $tokens = DB::table('tickets')->where('tickets.usuario', '=', $id)->distinct()->pluck('token');
        $tokensTicket = DB::table('tickets')->where('tickets.usuario', '=', $id)->distinct()->pluck('token');
        $tokensBuffet = DB::table('buffet')->where('usuario', '=', $id)->distinct()->pluck('token');
        $tokensMerchandising = DB::table('merchandising')->where('usuario', '=', $id)->distinct()->pluck('token');
        
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

        $tickets = DB::table('tickets')->where('usuario', '=', $id)->get()->groupBy('token');

        $buffet = DB::table('buffet')->where('usuario', '=', $id)->get()->groupBy('token');

        $merchandising = DB::table('merchandising')->where('usuario', '=', $id)->get()->groupBy('token');


        return view('dashboard', [
            'tokens' => $tokens,
            'tokensTicket' => $tokensTicket,
            'tickets' => $tickets,
            'tokensBuffet' =>$tokensBuffet,
            'buffet' => $buffet,
            'tokensMerchandising' => $tokensMerchandising,
            'merchandising' => $merchandising,
            'userId' => $request->user()['id']
        ]);
    }
}
