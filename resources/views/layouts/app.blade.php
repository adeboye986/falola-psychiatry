<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('meta_description', 'Falola Psychiatry Practice website foundation')">

        <title>@yield('title', config('app.name'))</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-slate-50 font-sans text-slate-900 antialiased">
        <div class="min-h-screen" x-data="{ navigationOpen: false }">
            <header class="border-b border-slate-200 bg-white">
                <nav class="mx-auto flex max-w-6xl items-center justify-between gap-6 px-6 py-4" aria-label="Primary navigation">
                    <a class="text-base font-semibold" href="{{ route('home') }}">
                        {{ config('app.name') }}
                    </a>

                    <button
                        class="rounded border border-slate-300 px-3 py-2 text-sm md:hidden"
                        type="button"
                        aria-controls="primary-navigation"
                        :aria-expanded="navigationOpen"
                        @click="navigationOpen = ! navigationOpen"
                    >
                        Menu
                    </button>

                    <div
                        id="primary-navigation"
                        class="absolute inset-x-0 top-[65px] border-b border-slate-200 bg-white px-6 py-4 md:static md:block md:border-0 md:p-0"
                        :class="navigationOpen ? 'block' : 'hidden md:block'"
                        x-cloak
                    >
                        <div class="flex flex-col gap-3 text-sm md:flex-row md:items-center md:gap-5">
                            <a href="{{ route('about') }}">About</a>
                            <a href="{{ route('services.index') }}">Services</a>
                            <a href="{{ route('telepsychiatry') }}">Telepsychiatry</a>
                            <a href="{{ route('patient-information') }}">Patient Information</a>
                            <a href="{{ route('appointments') }}">Appointments</a>
                            <a href="{{ route('patient-portal') }}">Patient Portal</a>
                            <a href="{{ route('contact') }}">Contact</a>
                        </div>
                    </div>
                </nav>
            </header>

            <main class="mx-auto w-full max-w-6xl px-6 py-16">
                @yield('content')
            </main>

            <footer class="border-t border-slate-200 bg-white">
                <div class="mx-auto max-w-6xl px-6 py-6 text-sm text-slate-600">
                    Phase 1 foundation. No patient information is collected by this site.
                </div>
            </footer>
        </div>
    </body>
</html>
