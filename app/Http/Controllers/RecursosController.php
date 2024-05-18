<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecursosController extends Controller
{
    public function index(): View
    {
        return view('recursos', [
            'form' => 'FORMULARIO',
        ]);
    }
    public function verified(Request $request)
    {
        $user = DB::table('tickets')->where('dni','=',$request->dni)->get();
        if($user->count() >= 1)
        {
            return view('recursos', [
                'dni' => $request->dni,
                'user' => $user,
            ]);
        }
        else
        {
            return view('recursos', [
                'dni' => $request->dni,
                'status' => 'El DNI ingresado no se encuentra registrado.',
            ]);
        }
    }
}
