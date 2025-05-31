<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'JM Mobilindo - Admin Page')</title>

    <!-- Fonts -->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@1&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('styles')

    
    
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">

    @include('dashboard.layouts.partials.navbar')

    @include('dashboard.layouts.partials.sidebar')

    @yield('content')

    {{-- Flowbite Script (In Layout) --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    @stack('scripts')
    <script>
        document.documentElement.classList.remove('dark');
    </script>

    <script>
        function logoutConfirm() {
            Swal.fire({
                text: "Sign Out?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Yes',
                customClass: {
                    popup: 'swal-popup',
                    icon: 'swal-icon',
                    title: 'swal-title',
                    timerProgressBar: 'swal-timer-bar',
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
    @if (Session::has('success'))
        <script type="module">
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                showCloseButton: true,
                showConfirmButton: false,
                backdrop: false,
                html: '{!! Session::get('success') !!}',
                customClass: {
                    popup: 'swal-popup',
                    icon: 'swal-icon',
                    title: 'swal-title',
                    timerProgressBar: 'swal-timer-bar'
                },
                timer: 4000, // 3 seconds
                timerProgressBar: true, // Optional: shows a progress bar as the timer counts down
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script type="module">
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                showCloseButton: true,
                showConfirmButton: false,
                backdrop: false,
                html: '{!! Session::get('error') !!}',
                customClass: {
                    popup: 'swal-popup',
                    icon: 'swal-icon',
                    title: 'swal-title',
                    timerProgressBar: 'swal-timer-bar'
                },
                timer: 4000, // 3 seconds
                timerProgressBar: true, // Optional: shows a progress bar as the timer counts down
            })
        </script>
    @endif
    @if (Session::has('info'))
        <script type="module">
            Swal.fire({
                position: 'top-end',
                icon: 'info',
                showCloseButton: true,
                showConfirmButton: false,
                backdrop: false,
                html: '{!! Session::get('info') !!}',
                customClass: {
                    popup: 'swal-popup',
                    icon: 'swal-icon',
                    title: 'swal-title',
                    timerProgressBar: 'swal-timer-bar'
                },
                timer: 4000, // 3 seconds
                timerProgressBar: true, // Optional: shows a progress bar as the timer counts down
            })
        </script>
    @endif
    @if (Session::has('warning'))
        <script type="module">
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                showCloseButton: true,
                showConfirmButton: false,
                backdrop: false,
                html: '{!! Session::get('warning') !!}',
                customClass: {
                    popup: 'swal-popup',
                    icon: 'swal-icon',
                    title: 'swal-title',
                    timerProgressBar: 'swal-timer-bar'
                },
                timer: 4000, // 3 seconds
                timerProgressBar: true, // Optional: shows a progress bar as the timer counts down
            })
        </script>
    @endif
    @if ($errors->any())
        <script type="module">
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Error',
                showCloseButton: true,
                showConfirmButton: false,
                backdrop: false,
                html: '@foreach ($errors->all() as $error) {!! $error . '<br>' !!}@endforeach',
                customClass: {
                    icon: 'swal-icon',
                    title: 'swal-title',
                    timerProgressBar: 'swal-timer-bar'
                },
                timer: 7000, // 3 seconds
                timerProgressBar: true, // Optional: shows a progress bar as the timer counts down
            })
        </script>
    @endif
    @stack('scripts')
</body>

</html>
