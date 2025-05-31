@extends('layouts.main') {{-- sesuaikan dengan layout utama kamu --}}

@section('title', $car->name)

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 font-sf-pro">
        <!-- Tombol Kembali -->
        {{-- <div class="mb-4">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
                <svg class="w-6 h-6 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14M5 12l4-4m-4 4 4 4" />
                </svg>
                Kembali
            </a>
        </div> --}}

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- swiper --}}
            <div class="flex flex-col justify-center w-full">
                <div class="product-images w-full px-2 md:px-4">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper product-detail2 w-full rounded-lg overflow-hidden">
                        <div class="swiper-wrapper">
                            @foreach ($car->images as $image)
                                <div
                                    class="swiper-slide flex justify-center items-center rounded-lg overflow-hidden bg-cover bg-center">
                                    <a href="{{ asset('storage/' . $image->image_path) }}" data-lightbox="car-gallery">
                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                            class="block w-full aspect-square rounded-lg overflow-hidden object-contain" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                    <div thumbsSlider="" class="swiper product-detail mt-2">
                        <div class="swiper-wrapper">
                            @foreach ($car->images as $image)
                                <div
                                    class="swiper-slide opacity-40 hover:opacity-100 transition w-1/4 sm:w-1/5 md:w-1/6 px-1 cursor-pointer">
                                    <img src="{{ asset('storage/' . $image->image_path) }}"
                                        class="object-contain w-full aspect-square rounded" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <!-- Detail Mobil -->
            <div>
                <h2 class="text-2xl font-bold">{{ $car->brand->name }} {{ $car->name }} ({{ $car->year }})</h2>
                <p class="text-gray-600 text-sm">{{ $car->description ?? 'Tidak ada deskripsi.' }}</p>

                <div class="mt-4 text-xl font-semibold text-orange-600 space-y-2">
                    @if ($car->price_type === 'contact')
                        <p>Hubungi untuk harga</p>
                    @else
                        <p>
                            <span
                                class="bg-orange-100 text-orange-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm  border border-orange-400">

                                @if ($car->price_type == 'otr_cash')
                                    OTR
                                @elseif ($car->price_type == 'otr_credit')
                                    OTR KREDIT
                                @elseif ($car->price_type == 'dp')
                                    DP
                                @endif
                            </span>
                            {{ 'Rp' . number_format($car->price_value, 0, ',', '.') }}
                        </p>
                    @endif
                    @if ($car->price_notes)
                        <p class="text-sm text-gray-600">{{ $car->price_notes }}</p>
                    @endif
                </div>

                @php
                    $phone = 62818227060;
                    $brand = $car->brand->name;
                    $name = $car->name;
                    $message = "Halo, saya ingin bertanya tentang mobil $brand $name";
                    $encodedMessage = urlencode($message);
                    $whatsappLink = "https://wa.me/$phone?text=$encodedMessage";
                @endphp

                <div class="flex flex-wrap gap-4 mt-6 mb-4">
                    <a href="{{ $whatsappLink }}" target="_blank"
                        class="inline-flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z"
                                clip-rule="evenodd" />
                            <path
                                d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z" />
                        </svg>
                        Hubungi Kami
                    </a>

                    <a href="{{ route('appointment') }}"
                        class="inline-block bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition">
                        Ajukan Janji Temu
                    </a>
                </div>

                <div class="text-base text-gray-800">
                    <p><strong>Plat:</strong> {{ $car->license_plate_area }}</p>
                    <p><strong>Jarak Tempuh:</strong> {{ number_format($car->mileage_km) }} KM</p>
                    <p><strong>Pajak Berlaku Sampai:</strong>
                        {{ \Carbon\Carbon::parse($car->tax_valid_until)->translatedFormat('F Y') }}</p>
                    <p><strong>Jenis:</strong>
                        @if ($car->type == 'gasoline')
                            Bensin
                        @else
                            EV
                        @endif
                    </p>
                </div>

                @if ($car->spec_image_path)
                    <div class="mt-4">
                        <p class="font-semibold mb-2">Spesifikasi:</p>
                        <a href="{{ asset('storage/' . $car->spec_image_path) }}" data-lightbox="car-specs">
                            <img src="{{ asset('storage/' . $car->spec_image_path) }}" class="ounded border w-full"
                                alt="Spesifikasi" />
                        </a>
                    </div>
                @endif



            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        var swiper = new Swiper(".product-detail", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });

        var swiper2 = new Swiper(".product-detail2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });

        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'alwaysShowNavOnTouchDevices': true,
        })
    </script>
@endpush
