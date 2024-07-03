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

    <section class="bg-gray-100">
        <div class="max-w-screen-xl sm:px-6 mx-auto px-4 py-16 lg:px-8">
            <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
                <div class="lg:col-span-2 lg:py-12">
                    <p class="text-lg ml-9 max-w-xl">
                        Di sini, anda dapat mengirim kami kritik & saran, serta tawaran kerjasama bisnis.
                    </p>

                    <div class="ml-9 mt-8">
                        <a href="#" class="text-2xl font-bold text-pink-600"> +62-123-456-789-10 </a>

                        <address class="mt-2 not-italic">Admin 1, Purbalingga, Jawa Tengah</address>
                    </div>
                </div>

                <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
                    @if (session('success'))
                        <div class="mb-4 rounded bg-green-500 p-4 text-white">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="sr-only" for="subjek">Subjek</label>
                            <input class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Subject"
                                type="text" id="subjek" name="subjek" value="{{ old('subjek') }}" />
                            @error('subjek')
                                <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:grid-cols-3 grid grid-cols-1 gap-4 text-center">
                            <div>
                                <label for="Option1"
                                    class="has-[:checked]:border-black has-[:checked]:bg-purple-600 has-[:checked]:text-white block w-full cursor-pointer rounded-lg border border-gray-200 p-3 text-gray-600 hover:border-black"
                                    tabindex="0">
                                    <input class="sr-only" id="Option1" type="radio" tabindex="-1" name="kategori"
                                        value="1" />
                                    <span class="text-sm"> Kritik & Saran </span>
                                </label>
                            </div>
                            <div>
                                <label for="Option2"
                                    class="has-[:checked]:border-black has-[:checked]:bg-purple-600 has-[:checked]:text-white block w-full cursor-pointer rounded-lg border border-gray-200 p-3 text-gray-600 hover:border-black"
                                    tabindex="0">
                                    <input class="sr-only" id="Option2" type="radio" tabindex="-1" name="kategori"
                                        value="2" />
                                    <span class="text-sm"> Bisnis </span>
                                </label>
                            </div>
                            @error('kategori')
                                <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="sr-only" for="message">Message</label>

                            <textarea class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Message" rows="8" id="message"
                                name="content">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button type="submit"
                                class="sm:w-auto inline-block w-full rounded-lg bg-purple-600 px-5 py-3 font-medium text-white">
                                Kirim
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <x-footer></x-footer>
</body>

</html>
