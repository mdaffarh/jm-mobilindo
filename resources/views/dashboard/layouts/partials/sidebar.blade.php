    {{-- sidebar --}}
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-orange-200 sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 text-black rounded-lg group 
                            {{ request()->routeIs('dashboard') ? 'bg-orange-100' : '' }} 
                            hover:bg-orange-100">
                        <svg class="w-5 h-5 transition duration-75 
                            {{ request()->routeIs('dashboard') ? 'text-orange-900' : 'text-orange-500' }} 
                            group-hover:text-orange-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('appointments.index') }}"
                        class="flex items-center p-2 text-black rounded-lg group 
                            {{ request()->routeIs('appointments.*') ? 'bg-orange-100' : '' }} 
                            hover:bg-orange-100">
                        <svg class="w-5 h-5 transition duration-75 
                            {{ request()->routeIs('appointments.*') ? 'text-orange-900' : 'text-orange-500' }} 
                            group-hover:text-orange-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                            <path
                                d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                            <path
                                d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Janji Temu</span>
                        @if ($pendingAppointmentsCount > 0)
                            <span data-tooltip-target="appointment-tooltip"
                                class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-orange-800 bg-orange-100 rounded-full">
                                {{ $pendingAppointmentsCount }}
                            </span>

                            <div id="appointment-tooltip" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip">
                                Permintaan Janji Temu
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="{{ route('cars.index') }}"
                        class="flex items-center p-2 text-black rounded-lg group 
                            {{ request()->routeIs('cars.*') ? 'bg-orange-100' : '' }} 
                            hover:bg-orange-100">
                        <svg class="w-5 h-5 transition duration-75 
                            {{ request()->routeIs('cars.*') ? 'text-orange-900' : 'text-orange-500' }} 
                            group-hover:text-orange-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M2.535 11A3.981 3.981 0 0 0 2 13v4a1 1 0 0 0 1 1h2v1a1 1 0 1 0 2 0v-1h10v1a1 1 0 1 0 2 0v-1h2a1 1 0 0 0 1-1v-4c0-.729-.195-1.412-.535-2H2.535ZM20 9V8a4 4 0 0 0-4-4h-3v5h7Zm-9-5H8a4 4 0 0 0-4 4v1h7V4Z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Kelola Mobil</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('news.index') }}"
                        class="flex items-center p-2 text-black rounded-lg group 
                            {{ request()->routeIs('news.*') ? 'bg-orange-100' : '' }} 
                            hover:bg-orange-100">
                        <svg class="w-5 h-5 transition duration-75 
                            {{ request()->routeIs('news.*') ? 'text-orange-900' : 'text-orange-500' }} 
                            group-hover:text-orange-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7Zm1 3V8h1v1H8Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Kelola Berita</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('brands.index') }}"
                        class="flex items-center p-2 text-black rounded-lg group 
                            {{ request()->routeIs('brands.*') ? 'bg-orange-100' : '' }} 
                            hover:bg-orange-100">
                        <svg class="w-5 h-5 transition duration-75 
                            {{ request()->routeIs('brands.*') ? 'text-orange-900' : 'text-orange-500' }} 
                            group-hover:text-orange-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M5 19h14M7.6 16l4.2979-10.92963c.0368-.09379.1674-.09379.2042 0L16.4 16m-8.8 0H6.5m1.1 0h1.65m7.15 0h-1.65m1.65 0h1.1m-8.33315-4h5.66025" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Data Merk</span>
                    </a>
                </li>

                {{-- Sign Out --}}
                <li>
                    <button onclick="logoutConfirm()"
                        class="flex items-center w-full p-2 text-black rounded-lg hover:bg-orange-100 group cursor-pointer text-start">
                        <svg class="shrink-0 w-5 h-5 text-orange-500 transition duration-75 group-hover:text-orange-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M5 12l4-4m-4 4 4 4" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Sign Out</span>
                    </button>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
    </aside>
