<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Portafolio') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            h1, h2, h3, .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }
            body { font-family: 'Inter', sans-serif; }
        </style>
    </head>
    <body class="bg-haiti text-white min-h-screen flex flex-col selection:bg-cyberyellow selection:text-haiti">
        @include('partials.topbar')

        <main class="flex-1 w-full">
            {{ $slot }}
        </main>

        @include('partials.footer')
    </body>
</html>
