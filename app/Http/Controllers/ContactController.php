<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use App\Models\KategoriPesan;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $kategoriPesan = KategoriPesan::all();
        return view('contact', compact('kategoriPesan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subjek' => 'required|string|max:255',
            'kategori' => 'required|exists:kategori_pesan,id',
            'content' => 'required|string',
        ]);

        Pesan::create([
            'subjek' => $request->subjek,
            'user_id' => Auth::id(),
            'kategori_id' => $request->kategori,
            'content' => $request->content,
        ]);

        return redirect()->route('contact')->with('success', 'Pesan Anda telah dikirim.');
    }
}
