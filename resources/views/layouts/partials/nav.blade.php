    {{-- Navbar --}}
    <header class="isolate fixed w-full z-99 top-0 start-0">
        <nav class="bg-gradient-to-tr from-dark-orange to-light-orange font-clash">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('images/logo-white.svg') }}" class="h-12" alt="JM Mobilindo Logo" />
                </a>

                {{-- Navbar Button for small width --}}
                <button data-collapse-toggle="navbar-dropdown" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg lg:hidden hover:bg-dark-orange focus:outline-none focus:ring-2 focus:ring-gray-200 cursor-pointer transition-all"
                    aria-controls="navbar-dropdown" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full lg:block lg:w-auto" id="navbar-dropdown">
                    <ul
                        class="flex flex-col font-medium p-4 lg:p-0 mt-4 border rounded-lg  lg:space-x-8 lg:flex-row lg:mt-0 lg:border-0 text-white">
                        <li>
                            <a href="{{ route('home') }}"
                                class="block py-2 px-3 text-white rounded-sm lg:bg-transparent lg:text-dark lg:p-0 
                                    lg:dark:bg-transparent hover:underline hover:font-semibold transition-all {{ request()->routeIs('home') ? 'font-semibold' : '' }}"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}"
                                class="block py-2 px-3 text-white rounded-sm lg:bg-transparent lg:text-dark lg:p-0 
                                    lg:dark:bg-transparent hover:underline hover:font-semibold transition-all {{ request()->routeIs('about') ? 'font-semibold' : '' }}"
                                aria-current="page">Tentang Kami</a>
                        </li>
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar2"
                                class="flex items-center justify-between w-full py-2 px-3 text-white rounded-sm hover:font-semibold hover:underline transition-all lg:p-0 lg:w-auto cursor-pointer {{ request()->routeIs('browseCars') ? 'font-semibold' : '' }} {{ request()->routeIs('browseBrands') ? 'font-semibold' : '' }}">Mobil
                                Bekas
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar2"
                                class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                                <ul class="py-2 text-sm text-dark-orange font-medium"
                                    aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="{{ route('browseCars') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 ">Lihat Semua</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('browseBrands') }}"
                                            class="block px-4 py-2 hover:bg-gray-100">Merek</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('browseNews') }}"
                                class="block py-2 px-3 text-white rounded-sm lg:bg-transparent lg:text-dark lg:p-0 
                                    lg:dark:bg-transparent hover:font-semibold hover:underline transition-all {{ request()->routeIs('browseNews') ? 'font-semibold' : '' }}"
                                aria-current="page">Berita</a>
                        </li>
                        <li>
                            <a href="{{ route('appointment') }}"
                                class="block py-2 px-3 text-white rounded-sm lg:bg-transparent lg:text-dark lg:p-0 
                                    lg:dark:bg-transparent hover:font-semibold hover:underline transition-all {{ request()->routeIs('appointment') ? 'font-semibold' : '' }}"
                                aria-current="page">Janji Temu</a>
                        </li>
                        <li>
                            <a href="{{ route('creditForm') }}"
                                class="block py-2 px-3 text-white rounded-sm lg:bg-transparent lg:text-dark lg:p-0 
                                    lg:dark:bg-transparent hover:font-semibold hover:underline transition-all {{ request()->routeIs('creditForm') ? 'font-semibold' : '' }}"
                                aria-current="page">Simulasi Kredit</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    {{-- Navbar End --}}
