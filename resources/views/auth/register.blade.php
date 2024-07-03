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
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <main
                class="sm:px-12 xl:col-span-6 flex items-center justify-center px-8 py-8 lg:col-span-7 lg:px-16 lg:py-12">
                <div class="max-w-xl lg:max-w-3xl">
                    <h1 class="text-2xl sm:text-3xl md:text-4xl mt-6 font-bold text-gray-900">
                        REGISTER
                    </h1>

                    <p class="mt-4 leading-relaxed text-gray-500">
                        Silahkan isi kolom-kolom berikut untuk mendaftarkan akun
                    </p>

                    <form method="POST" action="{{ route('register') }}" class="mt-8 grid grid-cols-6 gap-6">
                        @csrf

                        <div class="col-span-6">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="mt-1 block w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="name" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <x-input-label for="phone" :value="__('Phone')" />
                            <div class="mt-1 flex">
                                <x-text-input id="phone" name="phone" type="tel"
                                    class="block w-full rounded-none rounded-r-md" :value="old('phone')" required
                                    minlength="10" maxlength="15" autocomplete="phone" pattern="\+\d{10,15}"
                                    onkeyup="this.value = this.value.replace(/[^\d+]/g, '');"
                                    placeholder="No. Telepon harus diawali dengan kode telepon +62" />
                            </div>
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            <x-input-error :messages="$errors->get('phone_existed')" class="mt-2" />
                        </div>


                        <div class="sm:col-span-3 col-span-6">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="mt-1 block w-full" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="sm:col-span-3 col-span-6">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="sm:flex sm:items-center sm:gap-4 col-span-6">
                            <x-primary-button>
                                {{ __('Register') }}
                            </x-primary-button>

                            <p class="sm:mt-0 mt-4 text-sm text-gray-500">
                                <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    href="{{ route('login') }}">
                                    {{ __('Sudah punya akun?') }}
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
</body>

</html>
