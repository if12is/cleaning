<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @yield('title') | {{ config('app.name', 'Laravel') }}
        </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}">
        @yield('styles')
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <div class="app-container">
                @include('layouts.admin.header')
                <div class="app-content">
                    @include('layouts.admin.sidebar')
                    <main class="w-full">
                        @yield('content')
                    </main>
                </div>
            </div>
            <!-- Page Content -->
        </div>

        @yield('scripts')
        <!-- Scripts -->
        <script src="{{ asset('admin/assets/js/app.js') }}" defer></script>
    </body>

</html>
