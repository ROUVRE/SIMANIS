<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(50);

        return view('dashboard.admin.tabel-supplier', compact('suppliers'));
    }

    public function create()
    {
        return view('dashboard.admin.create-supplier');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:supplier',
            'phone' => 'required|string|max:15',
        ]);

        Supplier::create($request->all());

        return redirect()->route('admin.tabel-supplier')->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('dashboard.admin.edit-supplier', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:supplier,email,' . $id,
            'phone' => 'required|string|max:15',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());

        return redirect()->route('admin.tabel-supplier')->with('success', 'Supplier berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('barang')->where('supplier_id', $id)->delete();

        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

    return redirect()->route('admin.tabel-supplier')->with('success', 'Supplier berhasil dihapus.');
    }
}
