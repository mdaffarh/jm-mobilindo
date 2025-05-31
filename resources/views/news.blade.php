@extends('layouts.main')

@section('title', 'JM Mobilindo - Berita')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 font-sf-pro">
        <!-- Pencarian -->
        <form action="{{ route('browseNews') }}" method="GET" class="mb-6">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari berita..."
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


        <!-- Grid Berita -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($news as $item)
                <div class="flex flex-col h-full bg-white rounded-lg shadow hover:shadow-lg overflow-hidden transition-all">
                    <!-- Gambar -->
                    <div class="h-[180px] w-full bg-white flex items-center justify-center overflow-hidden">
                        @if ($item->thumbnail_path)
                            <img src="{{ asset('storage/' . $item->thumbnail_path) }}" alt="{{ $item->title }}"
                                class="w-full h-full object-cover">
                        @else
                            <div class="flex items-center justify-center w-full h-full bg-gray-100 text-gray-400">
                                Tidak ada gambar
                            </div>
                        @endif
                    </div>

                    <!-- Konten -->
                    <div class="flex flex-col justify-between flex-grow p-4">
                        <div>
                            <span
                                class="inline-block text-xs text-dark-orange border border-main-orange px-2 py-0.5 rounded-full font-semibold mb-1">Berita</span>
                            <p class="text-lg font-bold line-clamp-2 mb-2" title="{{ $item->title }}">
                                {{ $item->title }}
                            </p>
                        </div>

                        <div class="flex items-center justify-between text-xs text-gray-500 mt-auto">
                            <span>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}</span>
                            <a href="{{ route('showNews', $item->id) }}"
                                class="text-orange-600 hover:underline text-sm">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-gray-600">Berita tidak ditemukan.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $news->withQueryString()->links() }}
        </div>
    </div>
@endsection
