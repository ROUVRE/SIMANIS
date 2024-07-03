<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Edit User</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ $user->phone }}" minlength="10"
                    maxlength="15"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role" id="role"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-opacity-50">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="kepala_sekolah" {{ $user->role == 'kepala_sekolah' ? 'selected' : '' }}>Kepala
                        Sekolah</option>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>
            <div class="flex items-center justify-end">
                <a href="{{ route('admin.tabel-user') }}"
                    class="mr-4 text-sm text-gray-700 hover:text-gray-900">Batal</a>
                <button type="submit"
                    class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-700 focus:ring-offset-2">Update</button>
            </div>
        </form>
    </div>
</body>

</html>
