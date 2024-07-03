<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Gudang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{
    private function getBarangCountByCategory()
    {
        $barangCountByCategory = Barang::join('kategori', 'barang.kategori_id', '=', 'kategori.id')
            ->select('kategori.kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori.kategori')
            ->pluck('total', 'kategori.kategori')
            ->all();

        $categories = [
            'Furniture', 'Alat Tulis', 'Elektronik', 'Kebersihan', 'Olahraga', 'Lain-Lain'
        ];

        $categoryCounts = [];

        foreach ($categories as $category) {
            $categoryCounts[$category] = $barangCountByCategory[$category] ?? 0;
        }

        return $categoryCounts;
    }

    public function index()
    {
        $barang = Barang::with(['kategori', 'supplier', 'gudang'])->paginate(50);

        $barangCountByCategory = $this->getBarangCountByCategory();

        return view('barang.index', compact('barang', 'barangCountByCategory'));
    }

    public function home()
    {
        $barangCountByCategory = $this->getBarangCountByCategory();

        return view('home', compact('barangCountByCategory'));
    }

    public function dashboard()
    {
        $barangs = Barang::with(['kategori', 'supplier', 'gudang'])->paginate(50);

        $barangCountByCategory = $this->getBarangCountByCategory();

        return view('dashboard.admin.tabel-barang', compact('barangs', 'barangCountByCategory'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        $gudang = Gudang::all();
        return view('barang.edit', compact('barang', 'kategori', 'supplier', 'gudang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'deskripsi_barang' => 'required',
            'merk' => 'required',
            'stok_barang' => 'required',
            'supplier_id' => 'required',
            'gudang_id' => 'required',
            'harga_per_item' => 'required',
            'tanggal_pembelian' => 'required',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('admin.tabel-barang')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('admin.tabel-barang')->with('success', 'Barang berhasil dihapus');
    }

    public function create()
    {
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        $gudang = Gudang::all();
        return view('dashboard.admin.create-barang', compact('kategori', 'supplier', 'gudang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'deskripsi_barang' => 'nullable',
            'merk' => 'nullable',
            'stok_barang' => 'required|integer',
            'supplier_id' => 'required',
            'gudang_id' => 'required',
            'harga_per_item' => 'required|numeric',
            'tanggal_pembelian' => 'required|date',
        ]);

        Barang::create($request->all());

        return redirect()->route('admin.tabel-barang')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function downloadPDF()
    {
        $barang = Barang::with(['kategori', 'supplier', 'gudang'])->get();

        $pdf = Pdf::loadView('barang.pdf', compact('barang'))->setPaper('a4', 'landscape');
        return $pdf->download('data-barang.pdf');
    }
}
