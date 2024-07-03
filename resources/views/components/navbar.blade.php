<header
    class="box-border flex max-w-full flex-row items-start justify-start self-stretch px-20 py-0 text-left font-text-base-font-normal text-5xl text-gray-900 mq750:box-border mq750:pl-10 mq750:pr-10">
    <div class="box-border flex max-w-full flex-1 flex-col items-start justify-start px-0 py-6">
        <div class="flex max-w-full flex-row items-center justify-start gap-[32px] self-stretch mq750:gap-[16px]">
            <a class="flex flex-row items-center justify-start" href="{{ url('/') }}">
                <div
                    class="relative inline-block min-w-[102px] whitespace-nowrap font-semibold leading-[150%] text-purple-600">
                    SIMANIS
                </div>
            </a>
            <div
                class="box-border flex max-w-full flex-1 flex-row items-center justify-between gap-[20px] py-0 pl-0 pr-[583px] text-center text-base mq1050:box-border mq1050:pr-[291px] mq750:box-border mq750:hidden mq750:pr-[145px]">
                <a class="flex flex-col items-start justify-center" href="{{ url('/') }}">
                    <div class="relative inline-block min-w-[46px] font-medium leading-[150%]">
                        Home
                    </div>
                </a>
                <a class="flex flex-col items-start justify-center" href="{{ url('/barang') }}">
                    <div class="relative inline-block min-w-[55px] font-medium leading-[150%]">
                        Barang
                    </div>
                </a>
                <a class="flex flex-col items-start justify-center" href="{{ url('/contact') }}">
                    <div class="relative inline-block min-w-[70px] font-medium leading-[150%]">
                        Contact Us
                    </div>
                </a>
                <a class="flex flex-col items-start justify-center" href="{{ url('/#about') }}">
                    <div class="relative inline-block min-w-[47px] font-medium leading-[150%]">
                        About
                    </div>
                </a>
                <div class="h-6 w-[62px]"></div>
            </div>

            <div class="flex flex-row items-center justify-start gap-[16px] text-sm">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="flex cursor-pointer flex-row items-center justify-center overflow-hidden rounded-lg bg-purple-600 px-3 py-2 [border:none] hover:bg-darkorchid">
                            <div
                                class="relative inline-block min-w-[42px] text-left font-text-base-font-normal text-sm font-medium leading-[150%] text-white">
                                Dashboard
                            </div>
                        </a>
                    @else
                        <a class="relative inline-block min-w-[41px] whitespace-nowrap font-medium leading-[150%]"
                            href="{{ route('login') }}">
                            Log In
                        </a>

                        @if (Route::has('register'))
                            <a class="flex cursor-pointer flex-row items-center justify-center overflow-hidden rounded-lg bg-purple-600 px-3 py-2 [border:none] hover:bg-darkorchid"
                                href="{{ route('register') }}">
                                <div
                                    class="relative inline-block min-w-[42px] text-left font-text-base-font-normal text-sm font-medium leading-[150%] text-white">
                                    Daftar
                                </div>
                            </a>
                        @endif
                    @endauth
                    </nav>
                @endif
            </div>
        </div>
    </div>
</header>
