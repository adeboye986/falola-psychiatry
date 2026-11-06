<header class="relative z-40 border-b border-brand-sand/70 bg-white" x-data="{ navigationOpen: false }" @keydown.escape.window="navigationOpen = false">
    <nav class="mx-auto flex max-w-[90rem] items-center justify-between gap-5 px-5 py-2 sm:px-8 lg:px-10" aria-label="Primary navigation">
        <x-site.logo compact />

        <div class="hidden items-center gap-5 xl:flex 2xl:gap-8">
            <a class="site-nav-link {{ request()->routeIs('home') ? 'site-nav-link-active' : '' }}" href="{{ route('home') }}">Home</a>
            <a class="site-nav-link {{ request()->routeIs('about') ? 'site-nav-link-active' : '' }}" href="{{ route('about') }}">About</a>
            <a class="site-nav-link {{ request()->routeIs('services.*') ? 'site-nav-link-active' : '' }}" href="{{ route('services.index') }}">
                Services
                <svg class="size-3" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m3 4.5 3 3 3-3" /></svg>
            </a>
            <a class="site-nav-link {{ request()->routeIs('telepsychiatry') ? 'site-nav-link-active' : '' }}" href="{{ route('telepsychiatry') }}">Telepsychiatry</a>
            <a class="site-nav-link {{ request()->routeIs('patient-information') ? 'site-nav-link-active' : '' }}" href="{{ route('patient-information') }}">
                Patient Information
                <svg class="size-3" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m3 4.5 3 3 3-3" /></svg>
            </a>
            <a class="site-nav-link {{ request()->routeIs('office-fees-policies') ? 'site-nav-link-active' : '' }}" href="{{ route('office-fees-policies') }}">Office, Fees &amp; Policies</a>
        </div>

        <div class="hidden xl:flex">
            <x-site.button-link :href="route('appointments')" icon="calendar">
                Book an Appointment
            </x-site.button-link>
        </div>

        <button
            class="inline-flex size-11 items-center justify-center rounded-lg border border-brand-green text-brand-green transition hover:bg-brand-green hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green xl:hidden"
            type="button"
            aria-controls="mobile-navigation"
            :aria-expanded="navigationOpen"
            @click="navigationOpen = ! navigationOpen"
        >
            <span class="sr-only">Toggle navigation</span>
            <svg class="size-6" x-show="! navigationOpen" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16" /></svg>
            <svg class="size-6" x-show="navigationOpen" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" d="m6 6 12 12M18 6 6 18" /></svg>
        </button>
    </nav>

    <div
        id="mobile-navigation"
        class="absolute inset-x-0 top-full border-y border-brand-sand bg-white px-5 py-6 shadow-xl xl:hidden"
        x-show="navigationOpen"
        x-cloak
        x-transition.opacity.duration.150ms
        @click.outside="navigationOpen = false"
    >
        <div class="mx-auto flex max-w-2xl flex-col gap-1">
            <a class="mobile-nav-link" href="{{ route('home') }}" @click="navigationOpen = false">Home</a>
            <a class="mobile-nav-link" href="{{ route('about') }}" @click="navigationOpen = false">About</a>
            <a class="mobile-nav-link" href="{{ route('services.index') }}" @click="navigationOpen = false">Services</a>
            <a class="mobile-nav-link" href="{{ route('telepsychiatry') }}" @click="navigationOpen = false">Telepsychiatry</a>
            <a class="mobile-nav-link" href="{{ route('patient-information') }}" @click="navigationOpen = false">Patient Information</a>
            <a class="mobile-nav-link" href="{{ route('office-fees-policies') }}" @click="navigationOpen = false">Office, Fees &amp; Policies</a>
            <x-site.button-link class="mt-4 w-full" :href="route('appointments')" icon="calendar">
                Book an Appointment
            </x-site.button-link>
        </div>
    </div>
</header>
