<?php

namespace App\Http\Controllers;

use App\Mail\CompraEfectuada;
use App\Mail\ConfirmacionPago;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        return view('admin.edit', [
            'token' => $request->token,
            'tickets' => $tickets,
            'buffet' => $buffet,
            'merchandising' => $merchandising,
            'user' => $request->user(),
        ]);
    }
    public function paid(Request $request)
    {
        if(count(DB::table('tickets')->where('token', '=', $request->token)->get()) > 0)
        {
            DB::table('tickets')->where('token', '=', $request->token)->update(['pago' => true]);
        }
        if(count(DB::table('buffet')->where('token', '=', $request->token)->get()) > 0)
        {
            DB::table('buffet')->where('token', '=', $request->token)->update(['pago' => true]);
        }
        if(count(DB::table('merchandising')->where('token', '=', $request->token)->get()) > 0)
        {
            DB::table('merchandising')->where('token', '=', $request->token)->update(['pago' => true]);
        }
        
        $tickets = DB::table('tickets')->where('token', '=', $request->token)->get();

        $buffet = DB::table('buffet')->where('token', '=', $request->token)->get();

        $merchandising = DB::table('merchandising')->where('token', '=', $request->token)->get();

        Mail::to($request->user()['email'])->send(new ConfirmacionPago($request->token));

        return view('admin.edit',[
            'token' => $request->token,
            'tickets' => $tickets,
            'buffet' => $buffet,
            'merchandising' => $merchandising,
            'user' => $request->user(),
        ]);
    }
    public function redirect()
    {
        return to_route('admin.edit');
    }
}
