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
        if(count(DB::table('buffet')->where('token', '=', $request->token)->get()) > 0)
        {
            DB::table('buffet')->where('token', '=', $request->token)->update(['pago' => true]);
            $user = DB::table('buffet')->where('token', '=', $request->token)->get();
        }
        if(count(DB::table('merchandising')->where('token', '=', $request->token)->get()) > 0)
        {
            DB::table('merchandising')->where('token', '=', $request->token)->update(['pago' => true]);
            $user = DB::table('merchandising')->where('token', '=', $request->token)->get();
        }
        
        $u = DB::table('users')->where('id','=',$user[0]->usuario)->get();

        $email = $u[0]->email;

        $tickets = DB::table('tickets')->where('token', '=', $request->token)->get();

        $buffet = DB::table('buffet')->where('token', '=', $request->token)->get();

        $merchandising = DB::table('merchandising')->where('token', '=', $request->token)->get();

        Mail::to($email)->send(new ConfirmacionPago($request->token));

        return view('admin.tokens',[
            'token' => $request->token,
            'tickets' => $tickets,
            'buffet' => $buffet,
            'merchandising' => $merchandising,
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
            $ticketsPagos = DB::table('tickets')->orderByDesc('pago')->orderBy('funcion')->orderBy('apellidos')->get();
        }
        return view('admin.list',[
            'user' => $request->user(),
            'pagos' => $ticketsPagos,
        ]);
    }
    public function pastors(Request $request)
    {
        if($request->user()['email'] == 'ceo@sudacastream.com' || $request->user()['email'] == 'nahufidelibus@gmail.com')
        {
            $pastores = DB::table('tickets')->where('funcion','=','pastor')->orderBy('apellidos')->get();
        }
        return view('admin.pastores',[
            'user' => $request->user(),
            'pagos' => $pastores,
        ]);
    }
}
