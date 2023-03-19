<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function edit(Request $request): View
    {
        return view('admin.settings');
    }
}
