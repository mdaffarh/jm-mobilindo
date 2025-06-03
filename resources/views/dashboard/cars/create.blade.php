@extends('dashboard.layouts.master')

@section('content')
    <div class="p-4 pt-8 sm:ml-64">
        <div class="p-4 border-2 border-dark-orange border-dashed rounded-lg mt-14 font-sans ">
            <section class="mt-4 mb-6 text-center">
                <span class="text-4xl font-bold font-clash text-dark-orange">Tambah Data Mobil</span>
            </section>

            <section>
                <form class="max-w-2xl mx-auto" enctype="multipart/form-data" method="POST" action="{{ route('cars.store') }}">
                    @csrf

                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Mobil</label>
                        <input type="text" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="Contoh: Avanza G 2020" required />
                    </div>

                    <div class="mb-5">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi
                            (opsional)</label>
                        <textarea id="description" name="description" rows="4"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="Tuliskan detail kelebihan, fitur, dll..."></textarea>
                    </div>

                    <div class="mb-5">
                        <label for="brand_id" class="block mb-2 text-sm font-medium text-gray-900">Merk Mobil</label>
                        <select id="brand_id" name="brand_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                            <option value="">-- Pilih Merk --</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-5">
                        <label for="year" class="block mb-2 text-sm font-medium text-gray-900">Tahun Produksi</label>
                        <input type="number" id="year" name="year" min="1980" max="{{ date('Y') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required />
                    </div>

                    <div class="mb-5">
                        <label for="license_plate_area" class="block mb-2 text-sm font-medium text-gray-900">Plat
                            Daerah</label>
                        <input type="text" id="license_plate_area" name="license_plate_area"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="Contoh: B, D, AB" required />
                    </div>

                    <div class="mb-5">
                        <label for="mileage_km" class="block mb-2 text-sm font-medium text-gray-900">Kilometer</label>
                        <input type="number" id="mileage_km" name="mileage_km"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="Contoh: 65000" required />
                    </div>

                    <div class="mb-5">
                        <label for="tax_valid_until" class="block mb-2 text-sm font-medium text-gray-900">Pajak Aktif
                            Sampai</label>
                        <input type="date" id="tax_valid_until" name="tax_valid_until"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                    </div>

                    <div class="mb-5">
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Jenis Mobil</label>
                        <select id="type" name="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                            <option value="gasoline">Gasoline</option>
                            <option value="ev">Electric Vehicle (EV)</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label for="spec_image_path" class="block mb-2 text-sm font-medium text-gray-900">Gambar
                            Spesifikasi</label>
                        <div class="mb-2">
                            <img id="specImagePreview" src="#" alt="Preview"
                                class="hidden w-1/2 h-1/2 object-contain border border-gray-300 rounded-lg">
                        </div>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            id="spec_image_path" name="spec_image_path" type="file" accept="image/*"
                            onchange="previewSpecImage(event)">
                    </div>

                    <div class="mb-5">
                        <label for="price_type" class="block mb-2 text-sm font-medium text-gray-900">Tipe Harga</label>
                        <select id="price_type" name="price_type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required>
                            <option value="dp">DP</option>
                            <option value="otr_cash">OTR Cash</option>
                            <option value="otr_credit">OTR Kredit</option>
                            <option value="contact">Hubungi Kami</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label for="price_value" class="block mb-2 text-sm font-medium text-gray-900">Harga (jika
                            ada)</label>
                        <input type="number" id="price_value" name="price_value"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="Contoh: 150000000" />
                    </div>

                    <div class="mb-5">
                        <label for="price_notes" class="block mb-2 text-sm font-medium text-gray-900">Catatan
                            Harga</label>
                        <textarea id="price_notes" name="price_notes" rows="3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="Contoh: Bisa nego, Harga kredit dari..."></textarea>
                    </div>

                    <div class="mb-5">
                        <label for="images[]" class="block mb-2 text-sm font-medium text-gray-900">Galeri Gambar
                            Mobil</label>
                        <div id="imagePreviewContainer" class="flex flex-wrap gap-4 mb-2"></div>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            id="images" name="images[]" type="file" accept="image/*" multiple
                            onchange="previewMultipleImages(event)">
                    </div>

                    <button type="submit"
                        class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center cursor-pointer">
                        Tambah Data
                    </button>

                    <div class="mt-6 w-full">
                        <a href="{{ route('cars.index') }}"
                            class="flex items-center justify-center gap-1 text-black bg-orange-300 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-fit ms-auto">
                            <svg class="w-6 h-6 text-orange-800" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
                            </svg>
                            Kembali
                        </a>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function previewMultipleImages(event) {
            const container = document.getElementById('imagePreviewContainer');
            container.innerHTML = ''; // Clear previous previews

            const files = event.target.files;

            if (files) {
                [...files].forEach(file => {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('w-32', 'h-32', 'object-cover', 'border', 'rounded-lg');
                        container.appendChild(img);
                    }

                    reader.readAsDataURL(file);
                });
            }
        }

        function previewSpecImage(event) {
            const input = event.target;
            const preview = document.getElementById('specImagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
