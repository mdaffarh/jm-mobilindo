@extends('layouts.main')

@section('title', 'JM Mobilindo - Janji Temu')

@section('content')
    {{-- About Us --}}
    <div class="relative isolate py-20 px-4 md:px-10 lg:px-12 bg-white mb-12">
        <div class="max-w-7xl mx-auto text-center mb-8">
            <p class="font-bold font-stix text-2xl md:text-4xl mb-12">Janji Temu</p>
            <p class="font-sf-pro font-light text-base md:text-lg text-[#343A40] mb-6 text-justify max-w-2xl mx-auto">
                Ingin melihat mobil secara langsung atau berdiskusi langsung dengan tim kami? Silakan isi formulir janji
                temu di bawah ini untuk menentukan waktu kunjungan Anda ke showroom kami. Tim kami akan segera menghubungi
                Anda untuk konfirmasi melalui WhatsApp. Kami siap membantu Anda menemukan mobil impian dengan nyaman dan
                mudah.
            </p>
        </div>
        <div class="max-w-7xl mx-auto">
            @if (session('success'))
                <div id="alert-border-1"
                    class="max-w-2xl mx-auto flex items-center p-4 mb-4 text-orange-800 border-t-4 border-orange-300 bg-orange-50"
                    role="alert">
                    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
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
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif

            <section>
                <form class="max-w-2xl mx-auto" method="POST" action="{{ route('appointments.store') }}">

                    @csrf
                    <div class="mb-5">
                        <label for="customer_name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                        <input type="text" id="customer_name" name="customer_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="Jack" required />
                    </div>
                    <div class="mb-5">
                        <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 ">Nomor Telepon
                            (WhatsApp)</label>
                        <input type="text" name="phone_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            pattern="^(08|628)[0-9]{8,11}$" placeholder="089644708799" required />

                    </div>

                    <div class="mb-5 flex flex-wrap gap-6">
                        <!-- Input Tanggal -->
                        <div class="flex-1 min-w-[220px]">
                            <label for="datepicker-format"
                                class="block mb-2 text-sm font-medium text-gray-900">Tanggal</label>
                            <input id="datepicker-format" name="date" datepicker datepicker-buttons
                                datepicker-autoselect-today datepicker-format="D, d M yyyy" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Pilih Tanggal">
                        </div>

                        <!-- Input Jam -->
                        <div class="min-w-full sm:min-w-[140px]">
                            <label for="time" class="block mb-2 text-sm font-medium text-gray-900">Jam</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="time" id="time" name="time"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="14:00" required />
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="note" class="block mb-2 text-sm font-medium text-gray-900 ">Catatan</label>
                        <input type="text" id="note" name="note"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="Ingin test drive Avanza" />
                    </div>

                    <button type="submit"
                        class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center cursor-pointer">Kirim</button>
                </form>
            </section>
        </div>
    </div>
@endsection
