<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Edit Barang</h1>

        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" value="{{ $barang->nama_barang }}" required
                    class="sm:text-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori_id" id="kategori_id" required
                    class="sm:text-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}" {{ $k->id == $barang->kategori_id ? 'selected' : '' }}>
                            {{ $k->kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="deskripsi_barang" class="block text-sm font-medium text-gray-700">Deskripsi Barang</label>
                <textarea name="deskripsi_barang" id="deskripsi_barang" required
                    class="sm:text-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $barang->deskripsi_barang }}</textarea>
            </div>

            <div class="mb-4">
                <label for="merk" class="block text-sm font-medium text-gray-700">Merk</label>
                <input type="text" name="merk" id="merk" value="{{ $barang->merk }}" required
                    class="sm:text-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <label for="stok_barang" class="block text-sm font-medium text-gray-700">Stok Barang</label>
                <input type="number" name="stok_barang" id="stok_barang" value="{{ $barang->stok_barang }}" required
                    class="sm:text-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <label for="supplier_id" class="block text-sm font-medium text-gray-700">Supplier</label>
                <select name="supplier_id" id="supplier_id" required
                    class="sm:text-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @foreach ($supplier as $s)
                        <option value="{{ $s->id }}" {{ $s->id == $barang->supplier_id ? 'selected' : '' }}>
                            {{ $s->nama_supplier }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="gudang_id" class="block text-sm font-medium text-gray-700">Gudang</label>
                <select name="gudang_id" id="gudang_id" required
                    class="sm:text-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @foreach ($gudang as $g)
                        <option value="{{ $g->id }}" {{ $g->id == $barang->gudang_id ? 'selected' : '' }}>
                            {{ $g->gudang }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="harga_per_item" class="block text-sm font-medium text-gray-700">Harga Per Item</label>
                <input type="number" name="harga_per_item" id="harga_per_item" value="{{ $barang->harga_per_item }}"
                    required
                    class="sm:text-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <label for="tanggal_pembelian" class="block text-sm font-medium text-gray-700">Tanggal Pembelian</label>
                <input type="date" name="tanggal_pembelian" id="tanggal_pembelian"
                    value="{{ $barang->tanggal_pembelian }}" required
                    class="sm:text-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
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
