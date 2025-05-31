@extends('dashboard.layouts.master')

@section('content')
    <div class="p-4 pt-8 sm:ml-64">
        <div class="p-4 border-2 border-dark-orange border-dashed rounded-lg mt-14 font-sans">
            <section class="mt-4 mb-6 text-center">
                <span class="text-4xl font-bold font-clash text-dark-orange">Preview Berita</span>
            </section>

            <section class="max-w-2xl mx-auto">
                {{-- Judul --}}
                <div class="mb-5">
                    <h2 class="text-2xl font-semibold text-gray-900">{{ $news->title }}</h2>
                </div>

                {{-- Status --}}
                <div class="mb-5">
                    <span class="text-sm font-semibold text-gray-700">Status: </span>
                    <span class="inline-block px-2 py-1 text-sm text-white rounded-lg bg-orange-600">
                        {{ ucfirst($news->status) }}
                    </span>
                </div>

                {{-- Thumbnail --}}
                @if ($news->thumbnail_path)
                    <div class="mb-5">
                        <img src="{{ asset('storage/' . $news->thumbnail_path) }}" alt="Thumbnail"
                            class="w-full max-h-96 object-contain rounded-lg border border-gray-300">
                    </div>
                @endif

                {{-- Konten --}}
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Konten</label>
                    <article class="prose max-w-none">
                        {!! $news->content !!}
                    </article>
                </div>

                {{-- Tombol Kembali --}}
                <div class="mt-6 w-full">
                    <a href="{{ route('news.index') }}"
                        class="flex items-center justify-center gap-1 text-black bg-orange-300 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-fit ms-auto">
                        <svg class="w-6 h-6 text-orange-800" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M5 12l4-4m-4 4 4 4" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </section>
        </div>
    </div>
@endsection
