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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
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


        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            // Import FingerprintJS module from CDN
            const fpPromise = import('https://openfpcdn.io/fingerprintjs/v4')
                .then(FingerprintJS => FingerprintJS.load());

            // Function to set the device fingerprint as a default header in axios
            function setFingerprintHeader(visitorId) {
                if (axios) {
                    axios.defaults.headers.common['X-Device-Fingerprint'] = visitorId;
                } else {
                    console.error('Axios is not defined. Make sure Axios is imported before setting the header.');
                }
            }

            // Get the visitor identifier when you need it and set it as a header
            fpPromise
                .then(fp => fp.get())
                .then(result => {
                    // This is the visitor identifier:
                    const visitorId = result.visitorId;
                    console.log(visitorId); // Log visitor ID to the console for verification
                    setFingerprintHeader(visitorId); // Set the fingerprint header for axios requests
                })
                .catch(error => {
                    console.error('Error obtaining fingerprint:', error);
                });
        </script>

    </body>

</html>
