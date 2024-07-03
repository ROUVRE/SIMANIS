<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Tambah Barang</h1>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 p-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori_id" id="kategori_id"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="deskripsi_barang" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi_barang" id="deskripsi_barang"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50"></textarea>
            </div>
            <div class="mb-4">
                <label for="merk" class="block text-sm font-medium text-gray-700">Merk</label>
                <input type="text" name="merk" id="merk"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="stok_barang" class="block text-sm font-medium text-gray-700">Stok</label>
                <input type="number" name="stok_barang" id="stok_barang"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="supplier_id" class="block text-sm font-medium text-gray-700">Supplier</label>
                <select name="supplier_id" id="supplier_id"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
                    @foreach ($supplier as $s)
                        <option value="{{ $s->id }}">{{ $s->nama_supplier }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="gudang_id" class="block text-sm font-medium text-gray-700">Gudang</label>
                <select name="gudang_id" id="gudang_id"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
                    @foreach ($gudang as $g)
                        <option value="{{ $g->id }}">{{ $g->gudang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="harga_per_item" class="block text-sm font-medium text-gray-700">Harga Per Item</label>
                <input type="number" name="harga_per_item" id="harga_per_item"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="tanggal_pembelian" class="block text-sm font-medium text-gray-700">Tanggal Pembelian</label>
                <input type="date" name="tanggal_pembelian" id="tanggal_pembelian"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
            </div>
            <div class="flex items-center justify-end">
                <a href="{{ route('admin.tabel-barang') }}" class="mr-4 text-sm text-gray-700">Batal</a>
                <button type="submit"
                    class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Simpan</button>
            </div>
        </form>
    </div>
</body>

</html>
