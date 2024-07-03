<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <meta name="description" content="">

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800;900&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/21c7e9413c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

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
            <a href="{{ route('admin.dashboard') }}"
                class="active-nav-link nav-item flex items-center py-4 pl-6 text-white">
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
                class="nav-item flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100">
                <i class="fa-solid fa-envelope mr-3"></i>
                Pesan
            </a>
        </nav>
    </aside>

    <div class="flex h-screen w-full flex-col overflow-y-hidden">
        <!-- Desktop Header -->
        <x-dashboard-header></x-dashboard-header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="bg-sidebar sm:hidden w-full px-6 py-5">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-3xl font-semibold uppercase text-white hover:text-gray-300">SIMANIS</a>
                <button @click="isOpen = !isOpen" class="text-3xl text-white focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="active-nav-link nav-item flex items-center py-2 pl-4 text-white">
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
                    class="nav-item flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100">
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

        <div class="flex w-full flex-col overflow-x-hidden border-t">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl pb-6 text-black">Selamat datang, {{ Auth::user()->name }} 👋</h1>

                <div class="mt-6 flex flex-wrap">
                    <div class="w-full pr-0 lg:w-1/2 lg:pr-2">
                        <p class="flex items-center pb-3 text-xl">
                            <i class="fa-solid fa-briefcase mr-3"></i> Jumlah Barang per Kategori
                        </p>
                        <div class="bg-white p-6">
                            <canvas id="chartOne" width="400" height="200"></canvas>
                        </div>
                    </div>
                    <div class="mt-12 w-full pl-0 lg:mt-0 lg:w-1/2 lg:pl-2">
                        <p class="flex items-center pb-3 text-xl">
                            <i class="fa-solid fa-envelope mr-3"></i> Jumlah Pesan per Kategori
                        </p>
                        <div class="bg-white p-6">
                            <canvas id="chartTwo" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>

                <div class="mt-12 w-full">
                    <p class="flex items-center pb-3 text-xl">
                        <i class="fa-solid fa-circle-user mr-3"></i> Jumlah Akun Berdasarkan Role
                    </p>
                    <div class="mt-6 flex flex-wrap">
                        <div class="w-full pr-0 lg:w-1/2 lg:pr-2">
                            <div
                                class="mx-auto mb-5 flex max-w-sm items-center space-x-4 rounded-xl bg-white p-6 shadow-lg">
                                <div class="shrink-0">
                                    <i class="fa-solid fa-user h-50 w-50"></i>
                                </div>
                                <br>
                                <div>
                                    <div class="text-xl font-medium text-black">Kepala Sekolah</div>
                                    <p class="text-slate-500">Terdapat {{ $jumlahKepalaSekolah }} akun</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5 mt-12 w-full pl-0 lg:mt-0 lg:w-1/2 lg:pl-2">
                            <div
                                class="mx-auto flex max-w-sm items-center space-x-4 rounded-xl bg-white p-6 shadow-lg">
                                <div class="shrink-0">
                                    <i class="fa-solid fa-user h-50 w-50"></i>
                                </div>
                                <div>
                                    <div class="text-xl font-medium text-black">User</div>
                                    <p class="text-slate-500">Terdapat {{ $jumlahUser }} akun</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>

    <script>
        var chartOne = document.getElementById('chartOne').getContext('2d');
        var chartTwo = document.getElementById('chartTwo').getContext('2d');

        // Data untuk jumlah barang per kategori dari database
        var dataBarang = {
            labels: {!! json_encode($jumlahBarangPerKategori->pluck('kategori')->toArray()) !!},
            datasets: [{
                label: 'Jumlah Barang',
                data: {!! json_encode($jumlahBarangPerKategori->pluck('jumlah')->toArray()) !!},
                backgroundColor: [
                    '#ffcd56',
                    '#ff6384',
                    '#36a2eb',
                    '#fd6b19',
                    '#4bc0c0',
                    '#9966ff'
                ]
            }]
        };

        // Data untuk jumlah pesan per kategori dari database
        var dataPesan = {
            labels: {!! json_encode($jumlahPesanPerKategori->pluck('kategori_pesan')->toArray()) !!},
            datasets: [{
                label: 'Jumlah Pesan',
                data: {!! json_encode($jumlahPesanPerKategori->pluck('jumlah')->toArray()) !!},
                backgroundColor: [
                    '#ffcd56',
                    '#ff6384'
                ]
            }]
        };

        // Options untuk pie chart
        var options = {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw.toLocaleString();
                        }
                    }
                }
            }
        };

        // Inisialisasi pie chart untuk barang
        var myPieChart = new Chart(chartOne, {
            type: 'pie',
            data: dataBarang,
            options: options
        });

        // Inisialisasi pie chart untuk pesan
        var myPieChart2 = new Chart(chartTwo, {
            type: 'pie',
            data: dataPesan,
            options: options
        });
    </script>
</body>

</html>
