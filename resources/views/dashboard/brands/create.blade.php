@extends('dashboard.layouts.master')

@section('content')
    <div class="p-4 pt-8 sm:ml-64">
        <div class="p-4 border-2 border-dark-orange border-dashed rounded-lg mt-14 font-sans ">
            <section class="mt-4 mb-6 text-center">
                <span class="text-4xl font-bold font-clash text-dark-orange">Tambah Data Merk</span>
            </section>

            <section>
                <form class="max-w-2xl mx-auto" enctype="multipart/form-data" method="POST"
                    action="{{ route('brands.store') }}">

                    @csrf
                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Merk</label>
                        <input type="text" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="Toyota" required />
                    </div>
                    <div class="mb-5">
                        <label for="country" class="block mb-2 text-sm font-medium text-gray-900 ">Asal Negara</label>
                        <input type="text" id="country" name="country"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="Jepang" required />
                    </div>
                    <div class="mb-5">
                        <label for="logo" class="block mb-2 text-sm font-medium text-gray-900">Logo Brand</label>
                        <div class="mb-2">
                            <img id="imagePreview" src="#" alt="Preview"
                                class="hidden w-1/2 h-1/2 object-contain border border-gray-300 rounded-lg">
                        </div>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            id="logo" name="logo" type="file" accept="image/*" onchange="previewImage(event)">
                    </div>
                    <button type="submit"
                        class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center cursor-pointer">Tambah
                        Data</button>

                    <div class="mt-6 w-full">
                        <a href="{{ route('brands.index') }}"
                            class="flex items-center justify-center gap-1 text-black bg-orange-300 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-fit ms-auto">
                            <svg class="w-6 h-6 text-orange-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');

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
