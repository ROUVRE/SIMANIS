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
    <div class="relative flex w-full flex-col items-start justify-start bg-white leading-[normal] tracking-[normal]">

        <x-navbar></x-navbar>

        <section
            class="flex max-w-full flex-col items-start justify-center self-stretch overflow-hidden bg-white text-left font-text-base-font-normal text-41xl text-gray-900">
            <div
                class="box-border flex max-w-full flex-col items-center justify-start self-stretch px-20 py-16 mq750:box-border mq750:px-10 mq750:py-[42px]">
                <div
                    class="flex max-w-full flex-row items-center justify-end gap-[96px] self-stretch lg:flex-wrap mq750:gap-[48px] mq450:gap-[24px]">
                    <div
                        class="box-border flex min-w-[478px] max-w-full flex-1 flex-col items-start justify-start gap-[40px] px-0 py-5 mq750:min-w-full mq750:gap-[20px]">
                        <div class="flex flex-col items-start justify-start gap-[24px] self-stretch">
                            <h1
                                class="font-inherit relative m-0 self-stretch text-inherit font-black leading-[60px] mq1050:text-29xl mq1050:leading-[48px] mq450:text-17xl mq450:leading-[36px]">
                                <p class="m-0">Selamat Datang di</p>
                                <p class="m-0 text-purple-600">SIMANIS</p>
                            </h1>
                            <div
                                class="relative self-stretch text-xl leading-[150%] text-slategray mq450:text-base mq450:leading-[24px]">
                                Tempat mudah untuk semua manajemen inventaris sekolah anda.
                            </div>
                        </div>
                        <div class="flex flex-col items-start justify-start text-base text-gray-800">
                            <div class="flex flex-row items-start justify-start gap-[16px] mq450:flex-wrap">
                                <a href="#preview"
                                    class="flex cursor-pointer flex-row items-center justify-center overflow-hidden whitespace-nowrap rounded-lg bg-purple-600 px-5 py-3 [border:none] hover:bg-darkorchid">
                                    <div
                                        class="relative inline-block min-w-[97px] text-left font-text-base-font-normal text-base font-medium leading-[150%] text-white">
                                        Lihat Barang
                                    </div>
                                </a>
                                <a class="flex flex-row items-center justify-center overflow-hidden whitespace-nowrap rounded-lg border-[1px] border-solid border-gray-200 px-[19px] py-2.5"
                                    href="#about">
                                    <div class="relative inline-block min-w-[105px] font-medium leading-[150%]">
                                        Tentang Kami
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="box-border flex w-[448px] min-w-[448px] max-w-full flex-col items-end justify-center px-0 py-0 lg:flex-1 mq750:min-w-full mq750:gap-[20px]">
                        <img class="relative max-h-full w-[532px] max-w-[119%] shrink-0 object-cover lg:w-auto lg:self-stretch"
                            loading="lazy" alt="" src="{{ URL('/images/home-picture.svg') }}" />
                    </div>
                </div>
            </div>
        </section>

        <section id="preview"
            class="box-border flex max-w-full flex-col items-start justify-start self-stretch overflow-hidden bg-gray-50 px-20 py-24 text-left font-text-base-font-normal text-17xl text-gray-900 mq750:box-border mq750:px-10 mq750:py-[62px]">
            <div class="box-border flex max-w-full flex-row items-start justify-start self-stretch px-0 pb-4 pt-0">
                <h3
                    class="font-inherit relative m-0 inline-block max-w-full flex-1 text-inherit font-extrabold leading-[125%] tracking-[-0.01em] mq1050:text-10xl mq1050:leading-[36px] mq450:text-[22px] mq450:leading-[27px]">
                    Barang-Barang di Gudang
                </h3>
            </div>
            <div
                class="box-border flex max-w-full flex-row items-start justify-start self-stretch px-0 pb-4 pt-0 text-xl text-slategray">
                <div
                    class="relative inline-block max-w-full flex-1 leading-[150%] mq450:text-base mq450:leading-[24px]">
                    Berikut adalah preview data-data barang yang terdapat di gudang.
                </div>
            </div>
            <div
                class="box-border flex max-w-full flex-row items-start justify-start px-0 pb-8 pt-0 font-poppins text-29xl text-darkslategray">
                <div
                    class="flex w-[936px] max-w-full flex-row items-start justify-start gap-[40px] lg:flex-wrap mq750:gap-[20px]">
                    @foreach ($barangCountByCategory as $kategori => $total)
                        <div
                            class="relative box-border flex w-[153px] shrink-0 flex-col items-start justify-start gap-[19px] px-0 py-3">
                            <div class="relative font-semibold mq1050:text-19xl mq450:text-10xl">
                                {{ $total }}
                            </div>
                            <div class="absolute bottom-[56px] left-[0px] !m-[0] h-[3px] w-[46px] bg-darkslategray">
                            </div>
                            <div class="relative inline-block min-w-[107px] text-5xl mq450:text-lgi">
                                {{ $kategori }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="relative h-px self-stretch bg-gray-200"></div>
            <a class="flex cursor-pointer flex-row items-start justify-start overflow-hidden whitespace-nowrap rounded-lg bg-purple-600 px-5 py-3 [border:none] hover:bg-darkorchid"
                href="{{ url('/barang') }}">
                <div
                    class="relative inline-block min-w-[86px] text-left font-text-base-font-normal text-base font-medium leading-[150%] text-white">
                    Lihat Detail
                </div>
            </a>
        </section>

        <section id="about"
            class="box-border flex max-w-full flex-col items-center justify-start self-stretch overflow-hidden bg-white px-20 py-24 text-left font-text-base-font-normal text-base text-gray-900 mq750:box-border mq750:px-10 mq750:py-[62px]">
            <div
                class="box-border flex max-w-full flex-col items-center justify-start self-stretch px-8 py-0 mq750:gap-[32px] mq450:gap-[16px]">
                <div class="flex max-w-full flex-col items-center justify-start gap-[24px] self-stretch">
                    <div
                        class="box-border flex max-w-full flex-col items-center justify-start self-stretch px-5 py-0 text-center text-5xl">
                        <div
                            class="relative inline-block w-[768px] max-w-full font-semibold leading-[162.5%] mq450:text-lgi mq450:leading-[31px]">
                            <span class="text-purple-600">SIMANIS</span>
                            (<span class="text-purple-600">Si</span>stem <span class="text-purple-600">Man</span>ajemen
                            <span class="text-purple-600">I</span>nventaris <span
                                class="text-purple-600">S</span>ekolah) merupakan
                            projek website sederhana yang dibangun menggunakan Laravel 11 dengan
                            tujuan untuk memenuhi tugas akhir mata kuliah Pemrograman Web 2
                            semester 4.
                            Website ini, seperti namanya, bertujuan untuk mengelola inventaris
                            sekolah seperti barang-barang elektronik, furniture, alat tulis, dan
                            lain-lain.
                        </div>
                    </div>
                    <div
                        class="flex flex-row items-center justify-center gap-[14px] self-stretch px-5 py-0 mq750:flex-wrap">
                        <img class="relative h-[60px] w-[60px] rounded-81xl object-cover" loading="lazy" alt=""
                            src="{{ URL('/images/profile-pic/profile1.png') }}" />

                        <div class="flex flex-row items-center justify-start gap-[12px] mq450:flex-wrap">
                            <div class="relative font-semibold leading-[125%]">
                                Reyno Alfarez Marchelian
                            </div>
                            <div class="relative inline-block min-w-[73px] text-sm leading-[18px] text-slategray">
                                H1D022111
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-row items-center justify-center gap-[14px] self-stretch px-5 py-0 mq750:flex-wrap">
                        <img class="relative h-[60px] w-[60px] rounded-81xl object-cover" alt=""
                            src="{{ URL('/images/profile-pic/profile2.png') }}" />

                        <div class="flex flex-row items-center justify-start gap-[12px] mq750:flex-wrap">
                            <div class="relative font-semibold leading-[125%]">
                                Muhammad Iqbal Firmansyah
                            </div>
                            <div class="relative inline-block min-w-[78px] text-sm leading-[18px] text-slategray">
                                H1D022079
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <x-footer></x-footer>
    </div>
</body>

</html>
