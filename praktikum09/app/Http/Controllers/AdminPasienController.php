<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPasienController extends Controller
{
    public function index()
    {
        return view('pasien.index');
    }
}
