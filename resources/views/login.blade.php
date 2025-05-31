@extends('layouts.main')

@section('title', 'JM Mobilindo - Login Admin')

@section('content')
    {{-- Form Login --}}
    <section class="relative h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/hero-bg.svg') }}')">
        <div class="flex items-center justify-center h-full">
            <form class="bg-white px-8 py-10 rounded-lg shadow-lg max-w-sm w-full font-poppins" method="POST"
                action="{{ route('login') }}">
                @csrf
                <div class="mb-5 text-xl text-center text-[#333333]">
                    Sign In
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-xs text-[#666666]">Email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-[#666666] text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                        required />
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-xs text-[#666666]">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-[#666666] text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required />
                        <button type="button" onclick="togglePasswordVisibility()"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm text-gray-500 cursor-pointer ">
                            <span id="showPasswordIcon">
                                <svg class="w-5 h-5 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
                {{-- <div class="flex items-start mb-5">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox"
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"
                            required />
                    </div>
                    <label for="remember" class="ml-2 text-sm text-[#666666]">Remember me</label>
                </div> --}}
                @if ($errors->any())
                    <div class="text-sm mb-2 text-red-700">{{ $errors->first('email') }}</div>
                @endif
                <button type="submit"
                    class="w-full text-white bg-main-orange hover:bg-dark-orange transition-all focus:ring-4 focus:ring-orange-300 rounded-3xl text-sm px-5 py-2.5 cursor-pointer">Log
                    In</button>
            </form>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const iconContainer = document.getElementById('showPasswordIcon');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                iconContainer.innerHTML =
                    `
                <!-- Eye Slash Icon (Hidden) -->
               <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>`;
            } else {
                passwordInput.type = "password";
                iconContainer.innerHTML = `
                <!-- Eye Icon (Visible) -->
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                    <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>`;
            }
        }
    </script>
@endpush
