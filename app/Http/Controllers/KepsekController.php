<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepsekController extends Controller
{
    public function index()
    {
        return view('dashboard.kepsek.index');
    }

    public function tabelBarang()
    {
        return view('dashboard.kepsek.tabel-barang');
    }
}
