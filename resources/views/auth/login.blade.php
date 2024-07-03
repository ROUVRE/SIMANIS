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

    <section class="bg-white">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <main
                class="sm:px-12 xl:col-span-6 flex items-center justify-center px-8 py-8 lg:col-span-7 lg:px-16 lg:py-12">
                <div class="max-w-xl lg:max-w-3xl">
                    <h1 class="text-2xl sm:text-3xl md:text-4xl mt-6 font-bold text-gray-900">
                        LOG IN
                    </h1>

                    <p class="mt-4 leading-relaxed text-gray-500">
                        Silahkan log in dengan memasukkan data akun yang sudah terdaftar
                    </p>

                    <form method="POST" action="{{ route('login') }}" class="mt-8 grid grid-cols-6 gap-6">
                        @csrf

                        <div class="col-span-6">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="mt-1 block w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="sm:col-span-3 col-span-6">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="mt-1 block w-full" type="password" name="password"
                                required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <label for="remember_me" class="flex gap-4">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                    name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="sm:flex sm:items-center sm:gap-4 col-span-6">
                            <x-primary-button>
                                {{ __('Log in') }}
                            </x-primary-button>
                            <br>

                            <a class="sm:mt-0 mt-4 text-sm text-gray-500" href="{{ route('register') }}">
                                {{ __('Belum punya akun?') }}
                            </a>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
</body>
