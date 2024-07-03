<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800;900&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" />
    <script src="https://kit.fontawesome.com/21c7e9413c.js" crossorigin="anonymous"></script>
</head>

<body>
    <x-navbar></x-navbar>

    <div class="container mx-auto mt-4">
        <div class="rounded-lg border border-gray-200">

            <div class="rounded-b-lg border-t border-gray-200 px-4 py-2">
                {{ $barang->links() }}
            </div>

            <div class="overflow-x-auto rounded-t-lg">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">ID</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama Barang</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Kategori</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Deskripsi Barang</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Merk</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Stok Barang</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Supplier</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Lokasi Penyimpanan</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Harga per Item</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Harga Total</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Tanggal Pembelian</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($barang as $barangs)
                            <tr>
                                <td class="whitespace-nowrap px-4 py-2 text-center font-medium text-gray-900">
                                    {{ $barangs->id }}</td>
                                <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700">
                                    {{ $barangs->nama_barang }}</td>
                                <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700">
                                    {{ $barangs->kategori->kategori }}</td>
                                <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700">
                                    {{ $barangs->deskripsi_barang }}</td>
                                <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700">{{ $barangs->merk }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700">
                                    {{ $barangs->stok_barang }}</td>
                                <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700">
                                    {{ $barangs->supplier->nama_supplier }}</td>
                                <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700">
                                    {{ $barangs->gudang->gudang }}</td>
                                <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700">
                                    Rp{{ $barangs->harga_per_item }}</td>
                                <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700">
                                    Rp{{ $barangs->harga_total }}</td>
                                <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700">
                                    {{ $barangs->tanggal_pembelian }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="rounded-b-lg border-t border-gray-200 px-4 py-2">
                {{ $barang->links() }}
            </div>
        </div>
    </div>

    <x-footer></x-footer>
</body>

</html>
