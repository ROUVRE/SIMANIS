<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.user.index');
    }

    public function tabelPesan()
    {
        return view('dashboard.user.tabel-pesan');
    }

}
