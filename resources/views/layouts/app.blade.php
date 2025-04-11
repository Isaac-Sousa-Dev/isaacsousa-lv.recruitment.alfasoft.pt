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

        

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

        <script>
            $(document).ready(function(){
                $('#phone').mask('(00) 00000-0000');
            });
        </script>

        <!-- Scripts -->
        <script src="//unpkg.com/alpinejs" defer></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">

        @if(session('success'))
            <div 
                x-data="{ show: true }" 
                x-init="setTimeout(() => show = false, 3000)" 
                x-show="show" 
                x-transition 
                class="fixed top-5 right-5 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50"
            >
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div 
                x-data="{ show: true }" 
                x-init="setTimeout(() => show = false, 3000)" 
                x-show="show" 
                x-transition 
                class="fixed top-5 right-5 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50"
            >
                {{ session('error') }}
            </div>
        @endif

        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
