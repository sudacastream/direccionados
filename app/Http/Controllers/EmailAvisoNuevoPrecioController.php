<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailAvisoNuevoPrecioController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.advice');
    }
    public function send(Request $request)
    {

    }
}
