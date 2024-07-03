<!DOCTYPE html>
<html>

<head>
    <title>Data Barang</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Data Barang</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Merk</th>
                <th>Stok</th>
                <th>Supplier</th>
                <th>Tempat Penyimpanan</th>
                <th>Harga per Item</th>
                <th>Harga Total</th>
                <th>Tanggal Pembelian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $index => $brg)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $brg->nama_barang }}</td>
                    <td>{{ $brg->kategori->kategori }}</td>
                    <td>{{ $brg->deskripsi_barang }}</td>
                    <td>{{ $brg->merk }}</td>
                    <td>{{ $brg->stok_barang }}</td>
                    <td>{{ $brg->supplier ? $brg->supplier->nama_supplier : 'Tidak ada supplier' }}</td>
                    <td>{{ $brg->gudang ? $brg->gudang->gudang : 'Tidak ada gudang' }}</td>
                    <td>Rp{{ number_format($brg->harga_per_item, 2) }}</td>
                    <td>Rp{{ number_format($brg->harga_total, 2) }}</td>
                    <td>{{ $brg->tanggal_pembelian }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
