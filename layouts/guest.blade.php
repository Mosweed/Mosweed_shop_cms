


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/2ddca6146c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>


    </style>

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-white " x-data="{ darkMode: false }" x-init="
if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
  localStorage.setItem('darkMode', JSON.stringify(true));
}
darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" x-cloak>

    <div x-bind:class="{'dark' : darkMode === true}" class="bg-white dark:bg-gray-900 ">

        @livewire('navigation-menu')


        <div class="h-full ">
            {{ $slot }}
        </div>

        <div class="py-5 bg-white dark:bg-gray-900">
        </div>






    </div>
    @livewireScripts
</body>

</html>
