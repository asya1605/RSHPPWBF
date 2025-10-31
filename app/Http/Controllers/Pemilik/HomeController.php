<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.pemilik.index');
    }
}
