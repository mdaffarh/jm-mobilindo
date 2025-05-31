@extends('layouts.main')

@section('title', 'JM Mobilindo - Merek Mobil')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 font-sf-pro">
        <!-- Pencarian -->
        <form action="{{ route('browseBrands') }}" method="GET" class="mb-6">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari merek..."
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

        <!-- Grid Merek -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($brands as $b)
                <div class="product-display flex flex-col h-full bg-white rounded-lg shadow overflow-hidden">
                    <!-- Gambar -->
                    <div class="bg-white aspect-[2/1] flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('storage/' . $b->image_path) }}" alt="{{ $b->name }}"
                            class="max-h-full max-w-full object-contain">
                    </div>

                    <!-- Konten -->
                    <div class="product-content flex flex-col justify-between flex-grow p-3 gap-1">
                        <p class="font-sf-pro font-normal text-lg truncate" title="{{ $b->name }}">
                            {{ $b->name }}
                        </p>

                        <p class="font-sf-pro text-base text-gray-700">{{ $b->country }}</p>

                        <a href="{{ route('browseCars', ['search' => $b->name]) }}"
                            class="mt-auto font-sf-pro text-base text-orange-600 cursor-pointer hover:underline">
                            Lihat Mobil
                        </a>

                    </div>
                </div>
            @empty
                <p class="col-span-full text-gray-600">Merek tidak ditemukan.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $brands->withQueryString()->links() }}
        </div>
    </div>
@endsection
