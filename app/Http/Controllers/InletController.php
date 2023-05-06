<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InletController extends Controller
{
    public function index(Request $request)
    {
        return view('inlet.index');
    }
    public function search(Request $request)
    {
        $token = DB::table('tickets')->where('token','=',$request->token)->get();
        return $token;
    }
}
