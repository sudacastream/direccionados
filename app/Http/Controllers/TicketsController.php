<?php

namespace App\Http\Controllers;

use Hamcrest\Core\Set;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PSpell\Config;

class TicketsController extends Controller
{
    public function edit(Request $request): View
    {
        return view('admin.tickets');
    }
    public function search(Request $request)
    {
        if(is_numeric($request->ticket))
        {
            $tickets = DB::table('tickets')->where('dni','=',$request->ticket)->get();
        }
        else
        {
            $tickets = DB::table('tickets')->where('apellidos','LIKE','%'.$request->ticket.'%')->orWhere('nombres','LIKE','%'.$request->ticket.'%')->get();
        }
        return view('admin.tickets',[
            'tickets' => $tickets,
            'user' => $request->user(),
        ]);
    }
    public function token(Request $request)
    {
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
}
