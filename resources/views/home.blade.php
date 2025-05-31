@extends('layouts.main')

@section('content')
    {{-- Hero --}}
    <section class="relative h-screen bg-cover bg-center " style="background-image: url('{{ asset('images/hero-bg.svg') }}')">
        <div class="relative z-10 flex flex-col items-center h-full text-center text-white px-4 pt-[50%] md:pt-[10%]">
            <img src="{{ asset('images/logo-white.svg') }}" alt="Logo JM Mobilindo" class="w-40 mb-6" />
            <h1 class="text-4xl md:text-6xl font-bold font-stix">Quality is Our Priority</h1>
            <p class="text-lg md:text-xl mt-4 font-sf-pro font-normal">Pilih mobil bekas impian Anda dengan tenang
                dan percaya diri!</p>
        </div>
    </section>

    {{-- Product Display Carousel --}}
    <div id="product-display-carousel" class="relative w-full max-w-7xl mx-auto" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative min-h-[400px] overflow-hidden rounded-lg md:min-h-[600px]">
            @foreach ($latestCars as $item)
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out text-center" data-carousel-item>
                    <div class="absolute block max-w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        <p class="font-sf-pro text-lg md:text-3xl font-bold mb-4">{{ $item->brand->name }}
                            {{ $item->name }}
                        </p>
                        <img src="{{ asset('storage/' . $item->images->first()->image_path) }}"
                            class="w-full h-auto max-h-[400px] object-contain rounded-lg mx-auto mb-4" alt="...">
                        <div class="font-sf-pro text-base md:text-2xl font-semibold flex items-center justify-center">
                            <span
                                class="bg-orange-100 text-orange-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm  border border-orange-400">

                                @if ($item->price_type == 'otr_cash')
                                    OTR
                                @elseif ($item->price_type == 'otr_credit')
                                    OTR KREDIT
                                @elseif ($item->price_type == 'dp')
                                    DP
                                @endif
                            </span>
                            {{ 'Rp' . number_format($item->price_value, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    {{-- Mobil Terbaru Swiper --}}
    <div class=" bg-center bg-no-repeat bg-cover" style="background-image: url('{{ asset('images/orange-bg.svg') }}');">
        <div class="relative isolate py-14 px-4 md:px-10 lg:px-12 max-w-7xl mx-auto">
            <div class="mb-6 flex justify-between">
                <p class="font-semibold font-sf-pro text-lg md:text-2xl text-white">MOBIL TERBARU</p>
                <a href="{{ route('browseCars') }}"
                    class="font-bold font-sf-pro text-white text-base md:text-xl underline">LIHAT SEMUA</a>
            </div>
            <div class="product-display-swiper">
                <div class="swiper-wrapper mb-3">
                    @foreach ($cars as $c)
                        <div class="swiper-slide">
                            <div class="product-display flex flex-col h-full">
                                <!-- Gambar -->
                                <div class="bg-white aspect-square flex items-center justify-center overflow-hidden">
                                    <img src="{{ asset('storage/' . $c->images->first()->image_path) }}" alt="..."
                                        class="max-h-full max-w-full object-contain">
                                </div>

                                <!-- Konten -->
                                <div class="product-content flex flex-col justify-between flex-grow p-3 gap-1">
                                    <!-- Nama mobil (dengan truncation) -->
                                    <p class="font-sf-pro font-normal text-lg truncate"
                                        title="{{ $c->brand->name }} {{ $c->name }}">
                                        {{ $c->brand->name }} {{ $c->name }}
                                    </p>

                                    <!-- Harga -->
                                    <p class="font-sf-pro font-bold text-xs">
                                        <span
                                            class="bg-orange-100 text-orange-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm  border border-orange-400">

                                            @if ($c->price_type == 'otr_cash')
                                                OTR
                                            @elseif ($c->price_type == 'otr_credit')
                                                OTR KREDIT
                                            @elseif ($c->price_type == 'dp')
                                                DP
                                            @endif
                                        </span>
                                    </p>
                                    <p class="font-sf-pro font-bold text-lg">
                                        {{ 'Rp' . number_format($c->price_value, 0, ',', '.') }}
                                    </p>

                                    <!-- Tahun -->
                                    <p class="font-sf-pro text-base text-gray-700">{{ $c->year }}</p>

                                    <!-- Link -->
                                    <a href="{{ route('showCarDetail', $c->id) }}"
                                        class="mt-auto font-sf-pro text-base text-orange-600 cursor-pointer hover:underline">
                                        Lihat Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="display-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#EC5D01" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="white" class="size-14 drop-shadow-md cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                </div>
                <div class="display-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#EC5D01" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="white" class="size-14 drop-shadow-md cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                </div>
            </div>
        </div>
    </div>

    {{-- Penawaran Swiper --}}
    <div class="relative isolate py-14 px-4 md:px-10 lg:px-12 bg-center bg-white max-w-7xl mx-auto">
        <div class="mb-6 flex justify-between">
            <p class="font-semibold font-sf-pro text-lg md:text-2xl text-black">PENAWARAN BULAN MARET</p>
            <a href="#" class="font-bold font-sf-pro text-main-orange text-base md:text-xl underline">LIHAT
                SEMUA</a>
        </div>
        <div class="product-display-swiper">
            <div class="swiper-wrapper mb-3">
                @foreach ($cars as $c)
                    <div class="swiper-slide">
                        <div class="product-display flex flex-col h-full">
                            <!-- Gambar -->
                            <div class="bg-white aspect-square flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('storage/' . $c->images->first()->image_path) }}" alt="..."
                                    class="max-h-full max-w-full object-contain">
                            </div>

                            <!-- Konten -->
                            <div class="product-content flex flex-col justify-between flex-grow p-3 gap-1">
                                <!-- Nama mobil (dengan truncation) -->
                                <p class="font-sf-pro font-normal text-lg truncate"
                                    title="{{ $c->brand->name }} {{ $c->name }}">
                                    {{ $c->brand->name }} {{ $c->name }}
                                </p>

                                <!-- Harga -->
                                <p class="font-sf-pro font-bold text-xs">
                                    <span
                                        class="bg-orange-100 text-orange-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm  border border-orange-400">

                                        @if ($c->price_type == 'otr_cash')
                                            OTR
                                        @elseif ($c->price_type == 'otr_credit')
                                            OTR KREDIT
                                        @elseif ($c->price_type == 'dp')
                                            DP
                                        @endif
                                    </span>
                                </p>
                                <p class="font-sf-pro font-bold text-lg">
                                    {{ 'Rp' . number_format($c->price_value, 0, ',', '.') }}
                                </p>

                                <!-- Tahun -->
                                <p class="font-sf-pro text-base text-gray-700">{{ $c->year }}</p>

                                <!-- Link -->
                                <a href="{{ route('showCarDetail', $c->id) }}"
                                    class="mt-auto font-sf-pro text-base text-orange-600 cursor-pointer hover:underline">
                                    Lihat Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="display-button-next">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#EC5D01" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="white" class="size-14 drop-shadow-md cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>

            </div>
            <div class="display-button-prev">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#EC5D01" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="white" class="size-14 drop-shadow-md cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>

            </div>
        </div>
    </div>

    {{-- Merek Mobil Swiper --}}
    <div class=" bg-center bg-no-repeat bg-cover" style="background-image: url('{{ asset('images/orange-bg.svg') }}');">
        <div class="relative isolate py-14 px-4 md:px-10 lg:px-12 max-w-7xl mx-auto">
            <div class="mb-6 flex justify-between">
                <p class="font-semibold font-sf-pro text-lg md:text-2xl text-white">MEREK MOBIL</p>
                <a href="{{ route('browseBrands') }}"
                    class="font-bold font-sf-pro text-white text-base md:text-xl underline">LIHAT SEMUA</a>
            </div>
            <div class="product-display-swiper">
                <div class="swiper-wrapper mb-3">
                    @foreach ($brands as $b)
                        <div class="swiper-slide">
                            <div class="product-display p-3">
                                <div class="bg-white aspect-[2/1] flex items-center justify-center mb-3">
                                    <img src="{{ asset('storage/' . $b->image_path) }}" alt="..."
                                        class="max-h-full max-w-full object-contain">
                                </div>

                                <div class="text-center mb-2">
                                    <p class="font-sf-pro font-medium text-2xl">{{ $b->name }}</p>
                                </div>
                                <a href="{{ route('browseCars', ['search' => $b->name]) }}"
                                    class="mt-auto font-sf-pro text-base text-orange-600 cursor-pointer hover:underline">
                                    Lihat Mobil
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="display-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#EC5D01" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="white" class="size-14 drop-shadow-md cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <div class="display-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#EC5D01" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="white" class="size-14 drop-shadow-md cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                </div>
            </div>
        </div>
    </div>
    {{-- Janji Temu Section --}}
    <div class="relative isolate py-14 px-4 md:px-10 lg:px-12 bg-white overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-10 max-w-7xl mx-auto">
            <!-- Image & Background Circles -->
            <div class="relative w-full flex justify-center">
                <img src="{{ asset('images/janji-temu.svg') }}" alt="Customer"
                    class="relative z-10 w-auto h-auto max-h-[350px] object-contain">
            </div>

            <!-- Text Content -->
            <div class="space-y-4 mx-auto md:mx-0">
                <h2 class="font-clash text-3xl md:text-4xl font-bold text-dark-orange leading-snug">
                    Mudahnya Buat Janji Temu,<br>
                    Temukan Mobil Impian Anda!
                </h2>
                <p class="text-black font-sf-pro text-lg md:text-xl font-medium">
                    Kini, memilih mobil idaman jadi lebih praktis!<br>
                    Dengan fitur Janji Temu Online, Anda bisa:
                </p>
                <ul class="list-disc list-inside text-lg md:text-xl text-black font-sf-pro space-y-1 font-medium">
                    <li>Booking kunjungan showroom tanpa antre</li>
                    <li>Konsultasi langsung dengan sales profesional</li>
                    <li>Test drive eksklusif sesuai jadwal Anda</li>
                </ul>
                <a href="/appointment"
                    class="text-lg inline-block bg-gradient-to-tr from-light-orange to-main-orange hover:bg-gradient-to-bl text-white font-medium py-2 px-5 rounded mt-3 font-sf-pro">
                    Buat Janji Temu
                </a>
            </div>
        </div>
    </div>

    {{-- Berita Swiper --}}
    <div class=" bg-center bg-no-repeat bg-cover" style="background-image: url('{{ asset('images/orange-bg.svg') }}');">
        <div class="relative isolate py-14 px-4 md:px-10 lg:px-12 max-w-7xl mx-auto">
            <div class="mb-6 flex justify-between">
                <p class="font-semibold font-sf-pro text-lg md:text-2xl text-white">BERITA</p>
                <a href="{{ route('browseNews') }}"
                    class="font-bold font-sf-pro text-white text-base md:text-xl underline">LIHAT SEMUA</a>
            </div>
            <div class="news-swiper rounded-lg py-2 overflow-x-hidden">
                <div class="swiper-wrapper mb-3">
                    @foreach ($news as $item)
                        {{-- Slide --}}
                        <div
                            class="swiper-slide bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl hover:-translate-y-2 transition-all cursor-pointer h-[420px] flex flex-col">
                            <div class="h-[180px] w-full bg-white flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('storage/' . $item->thumbnail_path) }}" alt="..."
                                    class="w-full h-full object-cover">
                            </div>

                            <div class="flex-1 px-5 py-4 flex flex-col justify-between">
                                <div>
                                    <span
                                        class="text-dark-orange text-sm me-2 px-2.5 py-0.5 rounded-full border border-main-orange font-sf-pro font-bold">Berita</span>
                                    <p class="font-sf-pro font-bold text-xl line-clamp-2 mt-1">{{ $item->title }}</p>
                                </div>

                                <div class="flex justify-between items-center mt-4">
                                    <p class="font-sf-pro text-xs text-gray-400">
                                        {{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('l, d F Y') }}
                                    </p>
                                    <a href="{{ route('showNews', $item->id) }}"
                                        class="text-orange-600 font-sf-pro text-sm hover:underline">
                                        Lihat Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="display-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#EC5D01" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="white" class="size-14 drop-shadow-md cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                </div>
                <div class="display-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#EC5D01" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="white" class="size-14 drop-shadow-md cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                </div>
            </div>
        </div>
    </div>

    {{-- Lokasi Section --}}
    <div class="relative isolate py-14 px-4 md:px-10 lg:px-12 bg-white overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-start max-w-7xl mx-auto">
            <!-- Map Section -->
            <div class="lg:col-span-2">
                <p class="font-bold font-sf-pro text-2xl mb-6">Kunjungi Kami</p>
                <div class="overflow-hidden rounded-md">
                    <div style="list-style:none; transition: none; overflow:hidden;" class="max-w-full aspect-[5.5/3]">
                        <div id="embed-map-display" style="height:100%; width:100%; max-width:100%;">
                            <iframe style="height:100%; width:100%; border:0;" frameborder="0"
                                src="https://www.google.com/maps/embed/v1/place?q=JM+Mobilindo&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address Section -->
            <div class="flex flex-col justify-center h-full">
                <p class="font-medium font-sf-pro text-2xl mb-2">Lokasi:</p>
                <a href="https://maps.app.goo.gl/ZxMkay5SLhkRDzkeA" target="_blank">
                    <p
                        class="font-sf-pro font-light text-base md:text-lg text-blue-500 hover:text-blue-700 hover:underline">
                        Jl. Jend. Sudirman No.330, Ciroyom, Kec. Andir, Kota Bandung, Jawa Barat 40182
                    </p>
                </a>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        const productDisplaySwiper = new Swiper(".product-display-swiper", {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {

                nextEl: ".display-button-next",
                prevEl: ".display-button-prev",
            },
            breakpoints: {
                1280: {
                    slidesPerView: 6,
                    //         spaceBetween: 30
                },
                1024: {
                    slidesPerView: 4,
                    //         spaceBetween: 30
                },
                768: {
                    spaceBetween: 20
                },
                640: {
                    slidesPerView: 3,
                    //         spaceBetween: 0
                }
            }
        });
        const newsSwiper = new Swiper(".news-swiper", {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: ".display-button-next",
                prevEl: ".display-button-prev",
            },
            breakpoints: {
                1280: {
                    slidesPerView: 3,
                    //         spaceBetween: 30
                },
                1024: {
                    // slidesPerView:2,
                    //         spaceBetween: 30
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
            }
        });
    </script>
@endpush
