<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.resepsionis.index');
    }
}
