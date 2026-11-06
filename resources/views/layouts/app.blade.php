<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('meta_description', 'Falola Psychiatry Practice')">
        @hasSection('canonical')
            <link rel="canonical" href="@yield('canonical')">
        @endif

        <title>@yield('title', config('app.name'))</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen overflow-x-hidden bg-brand-ivory font-sans text-slate-900 antialiased">
        <a class="sr-only z-50 rounded bg-white px-4 py-3 text-brand-green focus:not-sr-only focus:fixed focus:left-4 focus:top-4" href="#main-content">
            Skip to content
        </a>

        <x-site.navigation />

        <main id="main-content">
            @yield('content')
        </main>

        <x-site.footer />
    </body>
</html>
