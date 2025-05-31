@extends('dashboard.layouts.master')

@section('content')
    <div class="p-4 pt-8 sm:ml-64">
        <div class="p-4 border-2 border-dark-orange border-dashed rounded-lg mt-14 font-sans ">
            <section class="mt-4 mb-6">
                <span class="text-4xl font-bold font-clash text-dark-orange">Janji Temu</span>
            </section>
            <section>
                <div class="mx-auto">
                    <div
                        class="relative overflow-hidden bg-white shadow-md sm:rounded-lg border border-orange-500 min-h-[60vh]">
                        <div
                            class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4 ">
                            <div class="flex items-center flex-1 space-x-4">
                                <h5>
                                    <span class="text-gray-500">Total Data:</span>
                                    <span>{{ $appointments->count() }}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="overflow-x-auto pb-18">
                            <table class="w-full text-sm text-left text-gray-500 ">
                                <thead class="text-xs text-white uppercase bg-orange-500">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">No</th>
                                        <th scope="col" class="px-4 py-3">Nama</th>
                                        <th scope="col" class="px-4 py-3">Nomor Telepon</th>
                                        <th scope="col" class="px-4 py-3">Waktu</th>
                                        <th scope="col" class="px-4 py-3">Catatan</th>
                                        <th scope="col" class="px-4 py-3">Status</th>
                                        <th scope="col" class="px-4 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- customer_name, phone_number, date, time, note, status --}}
                                    @foreach ($appointments as $a)
                                        <tr class="border-b  hover:bg-orange-100">
                                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                                {{ $loop->iteration }}</td>
                                            <th scope="row"
                                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                                {{ $a->customer_name }}
                                            </th>
                                            <th scope="row"
                                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                                {{ $a->phone_number }}
                                            </th>
                                            <th scope="row"
                                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                                {{ \Carbon\Carbon::parse($a->time)->format('H.i') }} -
                                                {{ \Carbon\Carbon::parse($a->date)->translatedFormat('l, d F Y') }}

                                            </th>
                                            <th scope="row"
                                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                                @if ($a->note != null)
                                                    {{ $a->note }}
                                                @else
                                                    -
                                                @endif
                                            </th>
                                            <th scope="row"
                                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                                @if ($a->status == 'pending')
                                                    <span
                                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm capitalize">
                                                        {{ $a->status }}
                                                    </span>
                                                @elseif ($a->status == 'confirmed')
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm capitalize">
                                                        {{ $a->status }}
                                                    </span>
                                                @else
                                                    <span
                                                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm capitalize">
                                                        {{ $a->status }}
                                                    </span>
                                                @endif
                                            </th>
                                            <td class="px-4 py-3 flex items-center">
                                                <button id="dropdown{{ $a->id }}-button"
                                                    data-dropdown-toggle="dropdown{{ $a->id }}"
                                                    class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none cursor-pointer "
                                                    type="button">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                                <div id="dropdown{{ $a->id }}"
                                                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow ">
                                                    <ul class="py-1 text-sm text-gray-700 "
                                                        aria-labelledby="dropdown{{ $a->id }}-button">
                                                        <li>
                                                            <button type="button"
                                                                data-modal-target="modal-show-{{ $a->id }}"
                                                                data-modal-toggle="modal-show-{{ $a->id }}"
                                                                class="block py-2 px-4 hover:bg-gray-100 w-full text-left cursor-pointer">Detail</button>
                                                        </li>
                                                        <li>
                                                            @php
                                                                $phone = $a->phone_number;
                                                                $name = \Illuminate\Support\Str::title(
                                                                    $a->customer_name,
                                                                );
                                                                $time = \Carbon\Carbon::parse($a->time)->format('H.i');
                                                                $date = \Carbon\Carbon::parse(
                                                                    $a->date,
                                                                )->translatedFormat('l, d F Y');

                                                                $message = "Halo $name, kami dari JM Mobilindo ingin menghubungi Anda terkait permintaan janji temu pada $time - $date.";
                                                                $encodedMessage = urlencode($message);
                                                                $whatsappLink = "https://wa.me/$phone?text=$encodedMessage";
                                                            @endphp

                                                            <a href="{{ $whatsappLink }}" target="_blank"
                                                                class="block py-2 px-4 hover:bg-gray-100 text-cyan-700">Hubungi
                                                                (WA)
                                                            </a>
                                                        </li>

                                                        @if ($a->status != 'confirmed')
                                                            <li>
                                                                <a href="#"
                                                                    onclick="statusConfirm(event, 'form-confirm-{{ $a->id }}', 'konfirmasi')"
                                                                    class="block py-2 px-4 hover:bg-gray-100 text-green-700">Konfirmasi</a>
                                                            </li>
                                                        @endif
                                                        @if ($a->status != 'cancelled')
                                                            <li>
                                                                <a href="#"
                                                                    onclick="statusConfirm(event, 'form-cancel-{{ $a->id }}', 'pembatalan')"
                                                                    class="block py-2 px-4 hover:bg-gray-100 text-red-700">Batalkan</a>
                                                            </li>
                                                        @endif

                                                        <!-- Form Konfirmasi -->
                                                        <form id="form-confirm-{{ $a->id }}"
                                                            action="{{ route('appointments.updateStatus', ['appointment' => $a->id, 'status' => 'confirmed']) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('PATCH')
                                                        </form>

                                                        <!-- Form Pembatalan -->
                                                        <form id="form-cancel-{{ $a->id }}"
                                                            action="{{ route('appointments.updateStatus', ['appointment' => $a->id, 'status' => 'cancelled']) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('PATCH')
                                                        </form>

                                                    </ul>
                                                    <div class="py-1">
                                                        <!-- Tombol Delete -->
                                                        <form id="delete-form-{{ $a->id }}"
                                                            action="{{ route('appointments.destroy', $a->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <a href="#"
                                                            onclick="deleteConfirm(event, 'delete-form-{{ $a->id }}')"
                                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- Modal Show Data --}}
                                        <div id="modal-show-{{ $a->id }}" tabindex="-1" aria-hidden="true"
                                            class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden">
                                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <!-- Header -->
                                                    <div
                                                        class="flex items-center justify-between p-4 md:p-5 border-b border-gray-200 rounded-t">
                                                        <h3 class="text-xl font-semibold text-gray-900">
                                                            Detail Janji Temu
                                                        </h3>
                                                        <button type="button"
                                                            data-modal-hide="modal-show-{{ $a->id }}"
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
                                                    <div class="p-4 md:p-5 space-y-4 text-gray-900">
                                                        <p><strong>Nama Pelanggan:</strong> {{ $a->customer_name }}</p>
                                                        <p><strong>No. Telepon:</strong> {{ $a->phone_number }}</p>
                                                        <p>
                                                            <strong>Waktu:</strong>
                                                            {{ \Carbon\Carbon::parse($a->time)->format('H.i') }} -
                                                            {{ \Carbon\Carbon::parse($a->date)->translatedFormat('l, d F Y') }}
                                                        </p>
                                                        <p><strong>Status:</strong>
                                                            @if ($a->status == 'pending')
                                                                <span
                                                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm capitalize">
                                                                    {{ $a->status }}
                                                                </span>
                                                            @elseif ($a->status == 'confirmed')
                                                                <span
                                                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm capitalize">
                                                                    {{ $a->status }}
                                                                </span>
                                                            @else
                                                                <span
                                                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm capitalize">
                                                                    {{ $a->status }}
                                                                </span>
                                                            @endif
                                                        </p>
                                                        @if ($a->note)
                                                            <p><strong>Catatan:</strong> {{ $a->note }}</p>
                                                        @endif
                                                    </div>

                                                    <!-- Footer -->
                                                    <div
                                                        class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200">
                                                        <button data-modal-hide="modal-show-{{ $a->id }}"
                                                            type="button"
                                                            class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                                                            Tutup
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if ($appointments->count() == 0)
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
        // delete confirm
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

        function statusConfirm(event, formId, actionText) {
            event.preventDefault();
            Swal.fire({
                text: `Anda akan melakukan ${actionText} janji temu ini.`,
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
