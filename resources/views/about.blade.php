@extends('layouts.main')

@section('title', 'JM Mobilindo - Tentang Kami')

@section('content')
    {{-- About Us --}}
    <div class="relative isolate py-16 px-4 md:px-10 lg:px-12 bg-white">
        <div class="max-w-7xl mx-auto text-center mb-8">
            <p class="font-bold font-stix text-2xl md:text-4xl mb-12">About Us</p>
            <div class="overflow-hidden rounded-md">
                <img src="{{ asset('images/about-us.svg') }}" alt="About Us" class="w-full aspect-[2/1] object-cover">
            </div>
        </div>
        <div class="max-w-7xl mx-auto">
            <div>
                <p class="font-bold font-sf-pro text-2xl mb-2">Tentang Kami</p>

                <p
                    class="font-sf-pro font-light text-base md:text-lg text-[#343A40] leading-relaxed tracking-normal mb-6 text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat quas quod mollitia alias porro
                    consequuntur eum libero sunt laudantium est sint necessitatibus dolorum totam, nihil odit ut. Voluptate,
                    dolores. Libero, doloribus. Officiis odio nulla optio voluptates praesentium soluta, architecto dolorem
                    repellat? Possimus dolorum natus doloribus cumque consectetur quam numquam reiciendis debitis, labore,
                    incidunt nostrum suscipit sunt vero delectus deleniti corporis vel, quisquam voluptatibus ut! Vero
                    molestiae enim atque eius in eaque tempore assumenda illum dolor repellat, quibusdam aspernatur aut
                    nihil, illo eligendi dolorem labore dolore. Provident vel quasi molestiae aspernatur consequatur dolorum
                    impedit quo. Assumenda aut voluptates minima laudantium dolorum.
                </p>
                <p
                    class="font-sf-pro font-light text-base md:text-lg text-[#343A40] leading-relaxed tracking-normal mb-6 text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat quas quod mollitia alias porro
                    consequuntur eum libero sunt laudantium est sint necessitatibus dolorum totam, nihil odit ut. Voluptate,
                    dolores. Libero, doloribus. Officiis odio nulla optio voluptates praesentium soluta, architecto dolorem
                    repellat? Possimus dolorum natus doloribus cumque consectetur quam numquam reiciendis debitis, labore,
                    incidunt nostrum suscipit sunt vero delectus deleniti corporis vel, quisquam voluptatibus ut! Vero
                    molestiae enim atque eius in eaque tempore assumenda illum dolor repellat, quibusdam aspernatur aut
                    nihil, illo eligendi dolorem labore dolore. Provident vel quasi molestiae aspernatur consequatur dolorum
                    impedit quo. Assumenda aut voluptates minima laudantium dolorum.
                </p>


            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">
                <!-- Map Section -->
                <div class="lg:col-span-2">
                    <p class="font-bold font-sf-pro text-2xl mb-6">Kunjungi Kami</p>
                    <div class="overflow-hidden rounded-md">
                        <div style="list-style:none; transition: none; overflow:hidden;" class="max-w-full aspect-[5.5/3]">
                            <div id="embed-map-display" style="height:100%; width:100%; max-width:100%;">
                                <iframe style="height:100%; width:100%; border:0;" frameborder="0"
                                    src="https://www.google.com/maps/embed/v1/place?q=JM+Mobilindo&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Section -->
                <div class="flex flex-col justify-center h-full">
                    <p class="font-medium font-sf-pro text-2xl mb-2">Lokasi:</p>
                    <a href="https://maps.app.goo.gl/ZxMkay5SLhkRDzkeA" target="_blank">
                        <p
                            class="font-sf-pro font-light text-base md:text-lg text-blue-500 hover:text-blue-700 hover:underline">
                            Jl. Jend. Sudirman No.330, Ciroyom, Kec. Andir, Kota Bandung, Jawa Barat 40182
                        </p>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
