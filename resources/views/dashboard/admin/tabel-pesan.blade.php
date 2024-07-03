<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan</title>
    <meta name="description" content="">

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800;900&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/21c7e9413c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    <style>
        .font-family-poppins {
            font-family: poppins;
        }

        .bg-sidebar {
            background: #7e3af2;
        }

        .cta-btn {
            color: #6228c5;
        }

        .active-nav-link {
            background: #6228c5;
        }

        .nav-item:hover {
            background: #6b2ed5;
        }

        .account-link:hover {
            background: #7e3af2;
        }
    </style>
</head>

<body class="font-family-poppins flex bg-gray-100">

    <aside class="bg-sidebar sm:block relative hidden h-screen w-64 shadow-xl">
        <div class="p-6">
            <a href="{{ url('/') }}"
                class="text-3xl font-semibold uppercase text-white hover:text-gray-300">SIMANIS</a>
            <a href="{{ url('/') }}">
                <button
                    class="cta-btn mt-5 flex w-full items-center justify-center rounded-bl-lg rounded-br-lg rounded-tr-lg bg-white py-2 font-semibold shadow-lg hover:bg-gray-300 hover:shadow-xl">
                    Kembali
                </button>
            </a>
        </div>
        <nav class="pt-3 text-base font-semibold text-white">
            <a href="{{ route('admin.dashboard') }}" class="nav-item flex items-center py-4 pl-6 text-white opacity-75">
                <i class="fa-solid fa-house-chimney mr-3"></i>
                Dashboard
            </a>
            <a href="{{ route('admin.tabel-barang') }}"
                class="nav-item flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100">
                <i class="fa-solid fa-briefcase mr-3"></i>
                Barang
            </a>
            <a href="{{ route('admin.tabel-supplier') }}"
                class="nav-item flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100">
                <i class="fa-solid fa-truck mr-3"></i>
                Supplier
            </a>
            <a href="{{ route('admin.tabel-user') }}"
                class="nav-item flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100">
                <i class="fa-solid fa-users mr-3"></i>
                Users
            </a>
            <a href="{{ route('admin.tabel-pesan') }}"
                class="active-nav-link nav-item flex items-center py-4 pl-6 text-white hover:opacity-100">
                <i class="fa-solid fa-envelope mr-3"></i>
                Pesan
            </a>
        </nav>
    </aside>

    <div class="relative flex h-screen w-full flex-col overflow-y-hidden">
        <!-- Desktop Header -->
        <x-dashboard-header></x-dashboard-header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="bg-sidebar sm:hidden w-full px-6 py-5">
            <div class="flex items-center justify-between">
                <a href="{{ url('/') }}"
                    class="text-3xl font-semibold uppercase text-white hover:text-gray-300">SIMANIS</a>
                <button @click="isOpen = !isOpen" class="text-3xl text-white focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-item flex items-center py-2 pl-4 text-white opacity-75">
                    <i class="fa-solid fa-house-chimney mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('admin.tabel-barang') }}"
                    class="nav-item flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100">
                    <i class="fa-solid fa-briefcase mr-3"></i>
                    Barang
                </a>
                <a href="{{ route('admin.tabel-supplier') }}"
                    class="nav-item flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100">
                    <i class="fa-solid fa-truck mr-3"></i>
                    Supplier
                </a>
                <a href="{{ route('admin.tabel-user') }}"
                    class="nav-item flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100">
                    <i class="fa-solid fa-users mr-3"></i>
                    Users
                </a>
                <a href="{{ route('admin.tabel-pesan') }}"
                    class="active-nav-link nav-item flex items-center py-2 pl-4 text-white hover:opacity-100">
                    <i class="fa-solid fa-envelope mr-3"></i>
                    Pesan
                </a>
                <a href="{{ route('profile.edit') }}"
                    class="nav-item flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100">
                    <i class="fas fa-user mr-3"></i>
                    My Account
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();"
                        class="nav-item flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Log Out
                    </a>
                </form>
            </nav>
        </header>

        <div class="flex h-screen w-full flex-col overflow-x-hidden border-t">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl pb-6 text-black">Pesan</h1>

                <div class="mt-6 w-full">
                    <div class="rounded-b-lg border-t border-gray-200 px-4 py-2">
                        {{ $pesan->links() }}
                    </div>

                    <div class="overflow-auto bg-white">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="px-4 py-3 text-center text-sm font-semibold uppercase">ID</th>
                                    <th class="px-4 py-3 text-center text-sm font-semibold uppercase">Subjek</th>
                                    <th class="px-4 py-3 text-center text-sm font-semibold uppercase">Pengirim</th>
                                    <th class="px-4 py-3 text-center text-sm font-semibold uppercase">Kategori</th>
                                    <th class="px-4 py-3 text-center text-sm font-semibold uppercase">Isi Pesan</th>
                                    <th class="px-4 py-3 text-center text-sm font-semibold uppercase">Waktu</th>
                                    <th class="px-4 py-3 text-center text-sm font-semibold uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach ($pesan as $item)
                                    <tr>
                                        <td class="px-4 py-3 text-center">{{ $item->id }}</td>
                                        <td class="px-4 py-3 text-center">{{ $item->subjek }}</td>
                                        <td class="px-4 py-3 text-center">{{ $item->user->name }}</td>
                                        <td class="px-4 py-3 text-center">{{ $item->kategoriPesan->kategori_pesan }}
                                        </td>
                                        <td class="px-4 py-3 text-center">{{ $item->content }}</td>
                                        <td class="px-4 py-3 text-center">{{ $item->created_at }}</td>
                                        <td class="px-4 py-3 text-center">
                                            <form action="{{ route('pesan.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-block p-3 text-red-500 hover:bg-gray-50 focus:relative"
                                                    title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="h-6 w-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="rounded-b-lg border-t border-gray-200 px-4 py-2">
                        {{ $pesan->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
