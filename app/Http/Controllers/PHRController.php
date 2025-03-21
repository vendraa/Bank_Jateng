<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PHRController extends Controller
{
    public function index()
    {
        return view('phr.index');
    }
}
