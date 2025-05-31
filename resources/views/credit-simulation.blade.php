{{-- @extends('layouts.main')

@section('content')
    <div class="relative isolate py-20 px-4 md:px-10 lg:px-12 bg-white mb-12">
        <div class="max-w-7xl mx-auto text-center mb-8">
            <p class="font-bold font-stix text-2xl md:text-4xl mb-12">Simulasi Kredit</p>
            <p class="font-sf-pro font-light text-base md:text-lg text-[#343A40] mb-6 text-justify max-w-2xl mx-auto">
                Gunakan form berikut untuk menghitung simulasi kredit berdasarkan DP, tenor, dan bunga yang Anda inginkan.
                Tim kami akan menghubungi Anda untuk penawaran terbaik melalui WhatsApp.
            </p>
        </div>

        <div class="max-w-7xl mx-auto">
            @if (session('success'))
                <div id="alert-border-1"
                    class="max-w-2xl mx-auto flex items-center p-4 mb-4 text-orange-800 border-t-4 border-orange-300 bg-orange-50"
                    role="alert">
                    <svg class="shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-orange-50 text-orange-500 rounded-lg focus:ring-2 focus:ring-orange-400 p-1.5 hover:bg-orange-200 inline-flex items-center justify-center h-8 w-8"
                        data-dismiss-target="#alert-border-1" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif

            <section>
                <form class="max-w-2xl mx-auto" method="POST" action="{{ route('credit-simulation.calculate') }}">
                    @csrf

                    <!-- Nama & No HP -->
                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="Nama Anda" required>
                    </div>
                    <div class="mb-5">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telepon
                            (WhatsApp)</label>
                        <input type="text" name="phone" id="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="08xxxxxx" pattern="^(08|628)[0-9]{8,11}$" required>
                    </div>

                    <!-- Harga Mobil -->
                    <div class="mb-5">
                        <label for="car_price" class="block mb-2 text-sm font-medium text-gray-900">Harga Mobil</label>
                        <input type="number" name="car_price" id="car_price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="Contoh: 150000000" required>
                    </div>

                    <!-- Uang Muka -->
                    <div class="mb-5">
                        <label for="down_payment" class="block mb-2 text-sm font-medium text-gray-900">Uang Muka
                            (DP)</label>
                        <input type="number" name="down_payment" id="down_payment"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="Contoh: 30000000" required>
                    </div>

                    <!-- Tenor -->
                    <div class="mb-5">
                        <label for="tenor" class="block mb-2 text-sm font-medium text-gray-900">Tenor (dalam
                            bulan)</label>
                        <select name="tenor" id="tenor"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                            <option value="">Pilih tenor</option>
                            <option value="12">12 bulan</option>
                            <option value="24">24 bulan</option>
                            <option value="36">36 bulan</option>
                            <option value="48">48 bulan</option>
                            <option value="60">60 bulan</option>
                        </select>
                    </div>

                    <!-- Bunga -->
                    <div class="mb-5">
                        <label for="interest_rate" class="block mb-2 text-sm font-medium text-gray-900">Bunga
                            (persen/tahun)</label>
                        <input type="number" step="0.1" name="interest_rate" id="interest_rate"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="Contoh: 6.5" required>
                    </div>

                    <button type="submit"
                        class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Hitung
                        Simulasi</button>
                </form>
            </section>
        </div>
    </div>
@endsection --}}

@extends('layouts.main')

@section('title', 'JM Mobilindo - Simulasi Kredit')

@section('content')
    <div class="py-20 px-4 md:px-10 lg:px-12 bg-white mb-12">
        <div class="max-w-2xl mx-auto text-center mb-12">
            <h2 class="font-bold font-stix text-2xl md:text-4xl mb-4">Simulasi Kredit Mobil</h2>
            <p class="font-sf-pro font-light text-base text-[#343A40]">
                Hitung estimasi angsuran berdasarkan mobil pilihan, DP, bunga, dan tenor.
            </p>
        </div>

        <form class="max-w-2xl mx-auto space-y-6" method="POST" action="{{ route('simulateCredit') }}">
            @csrf
            <div>
                <label for="car_id" class="block mb-2 text-sm font-medium text-gray-900">Pilih Mobil</label>
                <select id="car_id" name="car_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                    <option value="">-- Pilih Mobil --</option>
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}"
                            {{ old('car_id') == $car->id || (isset($selectedCar) && $selectedCar->id == $car->id) ? 'selected' : '' }}>
                            {{ $car->brand->name }} {{ $car->name }} ({{ $car->year }}) -
                            {{ 'Rp' . number_format($car->price_value, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="dp" class="block mb-2 text-sm font-medium text-gray-900">Uang Muka (DP)</label>
                <input type="text" id="dp" name="dp" value="{{ old('dp') }}"
                    placeholder="contoh: 20000000"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>

                @error('dp')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="asuransi" class="block mb-2 text-sm font-medium text-gray-900">Pilih Asuransi</label>
                <select id="asuransi" name="asuransi"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    <option value="">-- Tidak Menggunakan Asuransi --</option>
                    <option value="komprehensif" {{ old('asuransi') == 'komprehensif' ? 'selected' : '' }}>Komprehensif
                    </option>
                    <option value="kombinasi" {{ old('asuransi') == 'kombinasi' ? 'selected' : '' }}>Kombinasi</option>
                </select>
            </div>


            <div>
                <label for="tenor" class="block mb-2 text-sm font-medium text-gray-900">Tenor (tahun)</label>
                <input type="number" id="tenor" name="tenor" value="{{ old('tenor', 3) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
            </div>

            <button type="submit"
                class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                Hitung Simulasi
            </button>
        </form>

        @if (isset($result))
            <div class="max-w-2xl mx-auto mt-10 p-6 bg-orange-50 rounded-lg shadow-sm border border-orange-200">
                <h3 class="font-bold text-lg mb-4 text-orange-700">Hasil Simulasi</h3>
                <ul class="text-sm space-y-2 font-sf-pro text-gray-800">
                    <li>Mobil: <strong>{{ $selectedCar->brand->name }} {{ $selectedCar->name }}</strong></li>
                    <li>Harga Mobil: <strong>Rp{{ number_format($selectedCar->price_value, 0, ',', '.') }}</strong></li>
                    <li>Bunga: <strong>{{ $result['bunga_rate'] }}% per tahun</strong></li>
                    <li>Asuransi: <strong>Rp{{ number_format($result['asuransi'], 0, ',', '.') }}</strong></li>
                    <li>Total Pinjaman: <strong>Rp{{ number_format($result['total_pinjaman'], 0, ',', '.') }}</strong></li>
                    <li>Estimasi Cicilan per Bulan: <strong class="text-orange-600">
                            Rp{{ number_format($result['angsuran'], 0, ',', '.') }}</strong></li>
                </ul>
            </div>
        @endif
    </div>
@endsection
