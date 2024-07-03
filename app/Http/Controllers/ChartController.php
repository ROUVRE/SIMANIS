<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class ChartController extends Controller
{
    public function index()
    {
        $jumlahBarangPerKategori = DB::table('barang')
            ->join('kategori', 'barang.kategori_id', '=', 'kategori.id')
            ->select('kategori.kategori', DB::raw('COUNT(barang.id) as jumlah'))
            ->groupBy('kategori.kategori')
            ->get();

        $jumlahPesanPerKategori = DB::table('pesan')
            ->join('kategori_pesan', 'pesan.kategori_id', '=', 'kategori_pesan.id')
            ->select('kategori_pesan.kategori_pesan', DB::raw('COUNT(pesan.id) as jumlah'))
            ->groupBy('kategori_pesan.kategori_pesan')
            ->get();

        $jumlahUser = User::where('role', 'user')->count();
        $jumlahKepalaSekolah = User::where('role', 'kepala_sekolah')->count();

        return view('dashboard.admin.index', [
            'jumlahBarangPerKategori' => $jumlahBarangPerKategori,
            'jumlahPesanPerKategori' => $jumlahPesanPerKategori,
            'jumlahUser' => $jumlahUser,
            'jumlahKepalaSekolah' => $jumlahKepalaSekolah,
        ]);
    }


}
