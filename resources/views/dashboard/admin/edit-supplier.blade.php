<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Edit Supplier</h1>

        <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama_supplier" class="block text-sm font-medium text-gray-700">Nama Supplier</label>
                <input type="text" name="nama_supplier" id="nama_supplier" value="{{ $supplier->nama_supplier }}"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" name="alamat" id="alamat" value="{{ $supplier->alamat }}"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ $supplier->email }}"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ $supplier->phone }}" minlength="10"
                    maxlength="15"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
            </div>
            <div class="flex items-center justify-end">
                <a href="{{ route('admin.tabel-supplier') }}"
                    class="mr-4 text-sm text-gray-700 hover:text-gray-900">Batal</a>
                <button type="submit"
                    class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-700 focus:ring-offset-2">Update</button>
            </div>
        </form>
    </div>
</body>

</html>
