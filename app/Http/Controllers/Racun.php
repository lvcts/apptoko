<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RacunController extends Controller
{
    public function view()
    {
        return view('admin.scan'); //pemanggilan view
    }
}
