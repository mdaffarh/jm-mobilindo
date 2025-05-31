@extends('dashboard.layouts.master')

@section('content')
    <div class="p-4 pt-8 sm:ml-64">
        <div class="p-4 border-2 border-dark-orange border-dashed rounded-lg mt-14 font-sans ">
            <section class="mt-4 mb-6">
                <span class="text-4xl font-bold font-clash text-dark-orange">Data Merk</span>
            </section>
            <section>
                <div class="mx-auto">
                    <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg border border-orange-500">
                        <div
                            class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                            <div class="flex items-center flex-1 space-x-4">
                                <h5>
                                    <span class="text-gray-500">Total Data:</span>
                                    <span class="">{{ $brands->count() }}</span>
                                </h5>
                            </div>
                            <div
                                class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                                <a href="{{ route('brands.create') }}"
                                    class="flex items-center justify-center px-4 py-2 text-sm font-semibold rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 cursor-pointer bg-main-orange text-white hover:bg-dark-orange transition-all">
                                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                    </svg>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="overflow-x-auto pb-18">
                            <table class="w-full text-sm text-left text-gray-500 ">
                                <thead class="text-xs text-white uppercase bg-orange-500">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">No</th>
                                        <th scope="col" class="px-4 py-3">Logo</th>
                                        <th scope="col" class="px-4 py-3">Merk</th>
                                        <th scope="col" class="px-4 py-3">Asal Negara</th>
                                        <th scope="col" class="px-4 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $b)
                                        <tr class="border-b  hover:bg-orange-100">
                                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                                {{ $loop->iteration }}</td>
                                            <th scope="row" class="px-4 py-2 font-medium text-center">
                                                <img src="{{ asset('storage/' . $b->image_path) }}"
                                                    alt="Logo {{ $b->name }}" class="w-auto h-8">
                                            </th>
                                            <th scope="row"
                                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                                {{ $b->name }}
                                            </th>
                                            <td class="px-4 py-2">
                                                <span
                                                    class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded ">{{ $b->country }}</span>
                                            </td>
                                            <td class="px-4 py-3 flex items-center">
                                                <button id="dropdown{{ $b->id }}-button"
                                                    data-dropdown-toggle="dropdown{{ $b->id }}"
                                                    class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none cursor-pointer "
                                                    type="button">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                                <div id="dropdown{{ $b->id }}"
                                                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow ">
                                                    <ul class="py-1 text-sm text-gray-700 "
                                                        aria-labelledby="dropdown{{ $b->id }}-button">
                                                        <li>
                                                            <a href="{{ route('brands.create') }}"
                                                                class="block py-2 px-4 hover:bg-gray-100 ">Tambah</a>
                                                        </li>
                                                        <li>
                                                            <button type="button"
                                                                data-modal-target="modal-show-{{ $b->id }}"
                                                                data-modal-toggle="modal-show-{{ $b->id }}"
                                                                class="block py-2 px-4 hover:bg-gray-100 w-full text-left cursor-pointer">Detail</button>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('brands.edit', $b->id) }}"
                                                                class="block py-2 px-4 hover:bg-gray-100 ">Edit</a>
                                                        </li>
                                                    </ul>
                                                    <div class="py-1">
                                                        <!-- Tombol Delete -->
                                                        <form id="delete-form-{{ $b->id }}"
                                                            action="{{ route('brands.destroy', $b->id) }}" method="POST"
                                                            style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <a href="#"
                                                            onclick="deleteConfirm(event, 'delete-form-{{ $b->id }}')"
                                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- Modal Show Data --}}
                                        <div id="modal-show-{{ $b->id }}" tabindex="-1" aria-hidden="true"
                                            class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden">
                                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                <div class="relative bg-white rounded-lg shadow ">
                                                    <!-- Header -->
                                                    <div
                                                        class="flex items-center justify-between p-4 md:p-5 border-b border-gray-200 rounded-t ">
                                                        <h3 class="text-xl font-semibold text-gray-900 ">
                                                            Detail Merk: {{ $b->name }}
                                                        </h3>
                                                        <button type="button"
                                                            data-modal-hide="modal-show-{{ $b->id }}"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center cursor-pointer">
                                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>

                                                    <!-- Body -->
                                                    <div class="p-4 md:p-5 space-y-4">
                                                        <div class="text-center">
                                                            <img src="{{ asset('storage/' . $b->image_path) }}"
                                                                alt="Logo {{ $b->name }}"
                                                                class="mx-auto w-44 h-44 object-contain rounded-lg border border-gray-200 mb-4">
                                                            <p class="text-lg text-gray-900 ">
                                                                <strong>Merk:</strong> {{ $b->name }}
                                                            </p>
                                                            <p class="text-lg text-gray-900 "><strong>Negara
                                                                    Asal:</strong> {{ $b->country }}</p>
                                                        </div>
                                                    </div>

                                                    <!-- Footer -->
                                                    <div
                                                        class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 ">
                                                        <button data-modal-hide="modal-show-{{ $b->id }}"
                                                            type="button"
                                                            class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if ($brands->count() == 0)
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-gray-500 hover:bg-orange-100">
                                                Tidak
                                                ada data.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        {{-- pagination --}}
                        <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
                            aria-label="Table navigation">
                            <span class="text-sm font-normal text-gray-500 ">
                                Showing
                                <span class="font-semibold text-gray-900 ">1-10</span>
                                of
                                <span class="font-semibold text-gray-900 ">1000</span>
                            </span>
                            <ul class="inline-flex items-stretch -space-x-px">
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700  ">
                                        <span class="sr-only">Previous</span>
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700  ">1</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700  ">2</a>
                                </li>
                                <li>
                                    <a href="#" aria-current="page"
                                        class="z-10 flex items-center justify-center px-3 py-2 text-sm leading-tight border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700 ">3</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700  ">...</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700  ">100</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700  ">
                                        <span class="sr-only">Next</span>
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function deleteConfirm(event, formId) {
            event.preventDefault();
            Swal.fire({
                text: "Hapus Data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'swal-popup',
                    icon: 'swal-icon',
                    title: 'swal-title',
                    timerProgressBar: 'swal-timer-bar',
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
@endpush
