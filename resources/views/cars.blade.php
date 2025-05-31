@extends('layouts.main')

@section('title', 'JM Mobilindo - Lihat Mobil')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 font-sf-pro">
        <!-- Pencarian -->
        <form action="{{ route('browseCars') }}" method="GET" class="mb-6">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari mobil..."
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
        </form>

        <!-- Tombol Kembali -->
        <div class="mb-4">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
                <svg class="w-6 h-6 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14M5 12l4-4m-4 4 4 4" />
                </svg>
                Kembali
            </a>
        </div>

        <!-- Grid Mobil -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($cars as $c)
                <div class="product-display flex flex-col h-full bg-white rounded-lg shadow overflow-hidden">
                    <!-- Gambar -->
                    <div class="bg-white aspect-square flex items-center justify-center overflow-hidden">
                        @if ($c->images->first())
                            <img src="{{ asset('storage/' . $c->images->first()->image_path) }}" alt="{{ $c->name }}"
                                class="max-h-full max-w-full object-contain">
                        @else
                            <span class="text-gray-400">Tidak ada gambar</span>
                        @endif
                    </div>

                    <!-- Konten -->
                    <div class="product-content flex flex-col justify-between flex-grow p-3 gap-1">
                        <p class="font-sf-pro font-normal text-lg truncate"
                            title="{{ $c->brand->name }} {{ $c->name }}">
                            {{ $c->brand->name }} {{ $c->name }}
                        </p>

                        <p class="font-sf-pro font-bold text-xs uppercase">
                            <span
                                class="bg-orange-100 text-orange-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm  border border-orange-400">

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
                            @if ($c->price_type === 'contact')
                                Hubungi untuk harga
                            @else
                                {{ 'Rp' . number_format($c->price_value, 0, ',', '.') }}
                            @endif
                        </p>

                        <p class="font-sf-pro text-base text-gray-700">{{ $c->year }}</p>

                        <a href="{{ route('showCarDetail', $c->id) }}"
                            class="mt-auto font-sf-pro text-base text-orange-600 cursor-pointer hover:underline">
                            Lihat Selengkapnya
                        </a>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-gray-600">Mobil tidak ditemukan.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $cars->withQueryString()->links() }}
        </div>
    </div>
@endsection
