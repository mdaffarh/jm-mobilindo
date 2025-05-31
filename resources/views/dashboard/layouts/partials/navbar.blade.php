    {{-- navbar --}}
    <nav class="fixed top-0 z-50 w-full bg-gradient-to-tr from-dark-orange to-light-orange">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-white rounded-lg sm:hidden hover:bg-dark-orange  hover:ring-2 focus:outline-none focus:ring-2 focus:ring-gray-200 cursor-pointer">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="#" class="flex flex-col ms-2 md:me-24">
                        <img src="{{ asset('images/logo-white.svg') }}" class="h-8 mb-2" alt="JM Mobilindo Logo" />
                        {{-- <span class="font-clash text-sm font-medium whitespace-nowrap text-white/80">Admin Page</span> --}}
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm rounded-full focus:ring-2 focus:ring-orange-300 cursor-pointer"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-orange-100 rounded-sm shadow-sm"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900" role="none">
                                    Admin
                                </p>
                                <p class="text-sm font-medium text-orange-900 truncate" role="none">
                                    admin@jmmobilindo.com
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-100"
                                        role="menuitem">Dashboard</a>
                                </li>
                                {{-- Sign out --}}
                                <li>
                                    <button onclick="logoutConfirm()"
                                        class="block w-full text-left px-4 py-2 text-sm text-orange-700 hover:bg-orange-100 cursor-pointer"
                                        role="menuitem">
                                        Sign out
                                    </button>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
