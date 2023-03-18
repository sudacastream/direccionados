<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function edit(Request $request): View
    {
        if($request->user()['email'] == 'ceo@sudacastream.com')
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

            return view('admin.edit', [
                'tokens' => $tokens,
                'tokensTicket' => $tokensTicket,
                'tickets' => $tickets,
                'tokensBuffet' =>$tokensBuffet,
                'buffet' => $buffet,
                'tokensMerchandising' => $tokensMerchandising,
                'merchandising' => $merchandising,
                'user' => $request->user(),
                'title' => 'Administración - Congreso Direccionados',
            ]);
        }
        else
        {
            return abort(404);
        }
    }
}
