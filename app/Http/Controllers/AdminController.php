<?php

namespace App\Http\Controllers;
use App\Models\Pesan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.index');
    }

    public function tabelBarang()
    {
        return view('dashboard.admin.tabel-barang');
    }

    public function tabelUser()
    {
        return view('dashboard.admin.tabel-user');
    }

    public function tabelSupplier()
    {
        return view('dashboard.admin.tabel-supplier');
    }

    public function tabelPesan()
    {
        return view('dashboard.admin.tabel-pesan');
    }
    public function viewPesan()
    {
        $pesan = Pesan::with('user', 'kategoriPesan')->paginate(10);
        return view('dashboard.admin.tabel-pesan', compact('pesan'));
    }

    public function destroyPesan($id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->delete();

        return redirect()->route('admin.tabel-pesan')->with('success', 'Pesan berhasil dihapus.');
    }
}
