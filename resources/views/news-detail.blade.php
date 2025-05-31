@extends('layouts.main')

@section('title', $news->title)

@section('content')
    <div class="max-w-5xl mx-auto py-10 px-4 font-sf-pro">
        <span
            class="inline-block mb-3 bg-none text-dark-orange text-sm px-2.5 py-0.5 rounded-full border border-main-orange font-bold">Berita</span>

        <h1 class="text-3xl font-bold text-dark-orange mb-2">{{ $news->title }}</h1>

        <div class="text-sm text-gray-500 mb-6">
            <span>{{ $news->created_at->translatedFormat('l, d F Y') }}</span>
        </div>

        @if ($news->thumbnail_path)
            <div class="w-full h-[300px] mb-6">
                <img src="{{ asset('storage/' . $news->thumbnail_path) }}" alt="Thumbnail"
                    class="w-full h-full object-cover rounded-lg shadow border border-gray-200">
            </div>
        @else
            <div
                class="w-full h-[300px] mb-6 flex items-center justify-center bg-gray-100 rounded-lg border border-gray-300">
                <span class="text-gray-400">Tidak ada gambar tersedia</span>
            </div>
        @endif

        <div class="prose max-w-none text-justify">
            @if ($news->content)
                {!! $news->content !!}
            @else
                <p class="text-gray-500 italic">Konten belum tersedia.</p>
            @endif
        </div>

        <div class="mt-10">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center gap-2 bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>
    </div>
@endsection
