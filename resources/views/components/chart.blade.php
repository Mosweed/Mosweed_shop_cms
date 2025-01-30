<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Admin One Tailwind CSS Admin Dashboard</title>

    <!-- Tailwind is included -->

    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.3.0/dist/alpine.js"></script>
    <script src="https://kit.fontawesome.com/2ddca6146c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">


    <link href="https://demo.filamentphp.com/css/filament/forms/forms.css?v=3.2.33.0" rel="stylesheet"
        data-navigate-track />
    <link href="https://demo.filamentphp.com/css/filament/support/support.css?v=3.2.33.0" rel="stylesheet"
        data-navigate-track />



    <style>
        :root {
            --danger-50: 254, 242, 242;
            --danger-100: 254, 226, 226;
            --danger-200: 254, 202, 202;
            --danger-300: 252, 165, 165;
            --danger-400: 248, 113, 113;
            --danger-500: 239, 68, 68;
            --danger-600: 220, 38, 38;
            --danger-700: 185, 28, 28;
            --danger-800: 153, 27, 27;
            --danger-900: 127, 29, 29;
            --danger-950: 69, 10, 10;
            --gray-50: 250, 250, 250;
            --gray-100: 244, 244, 245;
            --gray-200: 228, 228, 231;
            --gray-300: 212, 212, 216;
            --gray-400: 161, 161, 170;
            --gray-500: 113, 113, 122;
            --gray-600: 82, 82, 91;
            --gray-700: 63, 63, 70;
            --gray-800: 39, 39, 42;
            --gray-900: 24, 24, 27;
            --gray-950: 9, 9, 11;
            --info-50: 239, 246, 255;
            --info-100: 219, 234, 254;
            --info-200: 191, 219, 254;
            --info-300: 147, 197, 253;
            --info-400: 96, 165, 250;
            --info-500: 59, 130, 246;
            --info-600: 37, 99, 235;
            --info-700: 29, 78, 216;
            --info-800: 30, 64, 175;
            --info-900: 30, 58, 138;
            --info-950: 23, 37, 84;
            --primary-50: 255, 251, 235;
            --primary-100: 254, 243, 199;
            --primary-200: 253, 230, 138;
            --primary-300: 252, 211, 77;
            --primary-400: 251, 191, 36;
            --primary-500: 245, 158, 11;
            --primary-600: 217, 119, 6;
            --primary-700: 180, 83, 9;
            --primary-800: 146, 64, 14;
            --primary-900: 120, 53, 15;
            --primary-950: 69, 26, 3;
            --success-50: 240, 253, 244;
            --success-100: 220, 252, 231;
            --success-200: 187, 247, 208;
            --success-300: 134, 239, 172;
            --success-400: 74, 222, 128;
            --success-500: 34, 197, 94;
            --success-600: 22, 163, 74;
            --success-700: 21, 128, 61;
            --success-800: 22, 101, 52;
            --success-900: 20, 83, 45;
            --success-950: 5, 46, 22;
            --warning-50: 255, 251, 235;
            --warning-100: 254, 243, 199;
            --warning-200: 253, 230, 138;
            --warning-300: 252, 211, 77;
            --warning-400: 251, 191, 36;
            --warning-500: 245, 158, 11;
            --warning-600: 217, 119, 6;
            --warning-700: 180, 83, 9;
            --warning-800: 146, 64, 14;
            --warning-900: 120, 53, 15;
            --warning-950: 69, 26, 3;
        }
    </style>
    <style>
        [x-cloak=""],
        [x-cloak="x-cloak"],
        [x-cloak="1"] {
            display: none !important;
        }

        @media (max-width: 1023px) {
            [x-cloak="-lg"] {
                display: none !important;
            }
        }

        @media (min-width: 1024px) {
            [x-cloak="lg"] {
                display: none !important;
            }
        }
    </style>

    <link href="https://demo.filamentphp.com/css/filament/filament/app.css?v=3.2.33.0" rel="stylesheet"
        data-navigate-track />


    {{--






    <link href="https://demo.filamentphp.com/css/filament/filament/app.css?v=3.2.33.0" rel="stylesheet"
        data-navigate-track />

    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <style>
        :root {
            --font-family: "Inter";
            --sidebar-width: 20rem;
            --collapsed-sidebar-width: 4.5rem;
        }
    </style> --}}

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            setTimeout(() => {
                const activeSidebarItem = document.querySelector(
                    ".fi-sidebar-item-active"
                );

                if (!activeSidebarItem) {
                    return;
                }

                const sidebarWrapper = document.querySelector(".fi-sidebar-nav");

                if (!sidebarWrapper) {
                    return;
                }

                sidebarWrapper.scrollTo(
                    0,
                    activeSidebarItem.offsetTop - window.innerHeight / 2
                );
            }, 0);
        });
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])




    <!-- Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:wght@400;600;700&display=swap">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {{-- import tailwind last version --}}
    @livewireStyles

</head>

<body class="font-sans leading-normal tracking-normal bg-gray-100" x-data="{ darkMode: false }" x-init="
if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
  localStorage.setItem('darkMode', JSON.stringify(true));
}
darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" x-cloak>

    <div x-bind:class="{'dark' : darkMode === true}" class="bg-white dark:bg-gray-900 ">

        @include('layouts.admin.sidebar')

        <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">


            @include('layouts.admin.navbar')
            {{ $slot }}


        </main>

    </div>
    <!-- end: Main -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="{{ asset('admin/js/script.js') }}"></script>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/iconset/iconset-fontawesome-4.7.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-iconpicker.js') }}"></script>
    <script src="{{ asset('js/jquery-menu-editor.js') }}"></script>

    @livewireScripts()
</body>

</html>


