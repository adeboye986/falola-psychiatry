@extends('layouts.app')

@section('title', 'Telepsychiatry in Alabama | Falola Psychiatry Practice')
@section('meta_description', 'Learn about interactive video and audio appointments from Falola Psychiatry Practice for patients physically located in Alabama.')
@section('canonical', route('telepsychiatry'))

@section('content')
    <section class="overflow-hidden bg-brand-ivory">
        <div class="mx-auto grid max-w-[90rem] lg:min-h-[27rem] lg:grid-cols-[0.88fr_1.12fr]">
            <div class="flex items-center px-5 py-14 sm:px-8 lg:px-14 lg:py-12 xl:px-20">
                <div class="max-w-xl">
                    <h1 class="text-balance font-serif text-5xl font-normal leading-[0.98] tracking-[-0.035em] text-brand-green sm:text-6xl lg:text-[3.75rem]">
                        Convenient Virtual Care
                    </h1>
                    <p class="mt-5 max-w-lg text-base leading-7 text-slate-800 sm:text-[1.0625rem]">
                        Interactive video and audio appointments make it possible to connect from home or another private location while you are physically located in Alabama.
                    </p>
                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <x-site.button-link :href="route('appointments')" icon="calendar">
                            Book an Appointment
                        </x-site.button-link>
                        <x-site.button-link href="#how-it-works" variant="outline" arrow>
                            Learn How It Works
                        </x-site.button-link>
                    </div>
                </div>
            </div>

            <div class="h-80 overflow-hidden sm:h-[26rem] lg:h-auto">
                <img
                    class="size-full object-cover object-[50%_45%]"
                    src="{{ asset('images/telepsychiatry/hero.webp') }}"
                    alt="A person attending an online healthcare appointment from home."
                    width="2200"
                    height="1467"
                    fetchpriority="high"
                >
            </div>
        </div>
    </section>

    <section class="bg-white px-5 py-16 sm:px-8 lg:px-10 lg:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="text-center">
                <h2 class="text-balance font-serif text-4xl font-normal tracking-[-0.03em] text-brand-green sm:text-5xl">
                    Why Choose Telepsychiatry?
                </h2>
                <p class="mx-auto mt-4 max-w-2xl text-base leading-7 text-slate-700 sm:text-[1.0625rem]">
                    Video and audio appointments can make it easier to access care from a familiar setting.
                </p>
            </div>

            <div class="mt-12 grid gap-y-10 sm:grid-cols-2 lg:grid-cols-4 lg:gap-y-0">
                <article class="px-5 text-center lg:border-r lg:border-brand-green/15">
                    <span class="mx-auto grid size-14 place-items-center rounded-xl bg-[#edf4ea] text-brand-green" aria-hidden="true">
                        <svg class="size-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3.75 9h16.5M5.25 5.25h13.5a1.5 1.5 0 0 1 1.5 1.5v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z" />
                            <path stroke-linecap="round" d="M8 13h3m-3 3h6" />
                        </svg>
                    </span>
                    <h3 class="mt-5 font-serif text-2xl font-normal text-brand-green">Greater Convenience</h3>
                    <p class="mt-2 text-base leading-7 text-slate-700">
                        Connect by video and audio from home or another appropriate private location.
                    </p>
                </article>

                <article class="px-5 text-center lg:border-r lg:border-brand-green/15">
                    <span class="mx-auto grid size-14 place-items-center rounded-xl bg-[#edf4ea] text-brand-green" aria-hidden="true">
                        <svg class="size-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <circle cx="12" cy="12" r="8.25" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5V12l3 1.75" />
                        </svg>
                    </span>
                    <h3 class="mt-5 font-serif text-2xl font-normal text-brand-green">Appointment Access</h3>
                    <p class="mt-2 text-base leading-7 text-slate-700">
                        Request an available appointment through the practice's established booking page.
                    </p>
                </article>

                <article class="px-5 text-center sm:border-l sm:border-brand-green/15 lg:border-l-0 lg:border-r">
                    <span class="mx-auto grid size-14 place-items-center rounded-xl bg-[#edf4ea] text-brand-green" aria-hidden="true">
                        <svg class="size-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3.5 19 6v5.1c0 4.25-2.75 7.9-7 9.4-4.25-1.5-7-5.15-7-9.4V6l7-2.5Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 12 2 2 4-4" />
                        </svg>
                    </span>
                    <h3 class="mt-5 font-serif text-2xl font-normal text-brand-green">A Private Setting</h3>
                    <p class="mt-2 text-base leading-7 text-slate-700">
                        Prepare a quiet, private space and reliable video and audio equipment for your visit.
                    </p>
                </article>

                <article class="px-5 text-center">
                    <span class="mx-auto grid size-14 place-items-center rounded-xl bg-[#edf4ea] text-brand-green" aria-hidden="true">
                        <svg class="size-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <circle cx="9" cy="8" r="3" />
                            <circle cx="16.5" cy="9" r="2.25" />
                            <path stroke-linecap="round" d="M3.75 19c.3-3.2 2.3-5 5.25-5s4.95 1.8 5.25 5M14.5 14.25c3.15-.75 5.35 1.1 5.75 3.75" />
                        </svg>
                    </span>
                    <h3 class="mt-5 font-serif text-2xl font-normal text-brand-green">Live Video and Audio</h3>
                    <p class="mt-2 text-base leading-7 text-slate-700">
                        Meet with the physician through real-time video and audio communication.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section id="how-it-works" class="scroll-mt-24 bg-white px-5 pb-16 sm:px-8 lg:px-10 lg:pb-20">
        <div class="mx-auto grid max-w-7xl overflow-hidden rounded-3xl border border-brand-sand/70 bg-brand-ivory shadow-[0_18px_45px_rgba(31,50,42,0.1)] lg:grid-cols-[1.02fr_0.98fr]">
            <div class="min-h-80 lg:min-h-[28rem]">
                <img
                    class="size-full object-cover object-center"
                    src="{{ asset('images/telepsychiatry/how-it-works.webp') }}"
                    alt="A person participating in a video appointment on a laptop."
                    width="2200"
                    height="1467"
                    loading="lazy"
                >
            </div>

            <div class="flex items-center px-7 py-10 sm:px-10 lg:px-12 lg:py-12">
                <div>
                    <h2 class="text-balance font-serif text-4xl font-normal leading-tight tracking-[-0.03em] text-brand-green sm:text-5xl">
                        A Simple Video Appointment Process
                    </h2>
                    <p class="mt-4 text-base leading-7 text-slate-700">
                        The practice's existing scheduling and day-of instructions guide each appointment.
                    </p>

                    <ol class="mt-7 space-y-6">
                        <li class="grid grid-cols-[2.75rem_1fr] gap-4">
                            <span class="grid size-11 place-items-center rounded-full border-[6px] border-[#e3eee7] bg-brand-green font-semibold text-white">1</span>
                            <div>
                                <h3 class="font-serif text-xl font-normal text-brand-green">Schedule an Appointment</h3>
                                <p class="mt-1 text-sm leading-6 text-slate-700">Use the appointment page to request an available time.</p>
                            </div>
                        </li>
                        <li class="grid grid-cols-[2.75rem_1fr] gap-4">
                            <span class="grid size-11 place-items-center rounded-full border-[6px] border-[#e3eee7] bg-brand-green font-semibold text-white">2</span>
                            <div>
                                <h3 class="font-serif text-xl font-normal text-brand-green">Follow Appointment Instructions</h3>
                                <p class="mt-1 text-sm leading-6 text-slate-700">Visit information is provided at the beginning of the appointment day.</p>
                            </div>
                        </li>
                        <li class="grid grid-cols-[2.75rem_1fr] gap-4">
                            <span class="grid size-11 place-items-center rounded-full border-[6px] border-[#e3eee7] bg-brand-green font-semibold text-white">3</span>
                            <div>
                                <h3 class="font-serif text-xl font-normal text-brand-green">Join at the Scheduled Time</h3>
                                <p class="mt-1 text-sm leading-6 text-slate-700">Use video and audio, and contact the practice if you experience technical problems.</p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white px-5 pb-16 sm:px-8 lg:px-10 lg:pb-20">
        <div class="mx-auto grid max-w-7xl items-center gap-7 rounded-3xl border border-brand-green/10 bg-[#eef5ed] px-7 py-9 sm:px-10 lg:grid-cols-[16rem_1fr] lg:gap-10 lg:px-14">
            <div class="flex items-center justify-center gap-7 text-brand-green lg:border-r lg:border-brand-green/35 lg:pr-10" aria-hidden="true">
                <svg class="h-24 w-20 shrink-0" viewBox="0 0 80 100" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m23 6 36 2 1 17 5 14-3 15 7 17-8 4 1 11-18-1-7 8-19-2 3-22-7-11 4-20 5-32Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M41 38a8 8 0 0 0-8 8c0 6 8 14 8 14s8-8 8-14a8 8 0 0 0-8-8Z" />
                    <circle cx="41" cy="46" r="2.25" fill="currentColor" stroke="none" />
                </svg>
            </div>
            <div>
                <h2 class="font-serif text-3xl font-normal tracking-[-0.025em] text-brand-green sm:text-4xl">
                    Important: Location Requirement
                </h2>
                <p class="mt-3 max-w-4xl text-base leading-7 text-slate-800 sm:text-[1.0625rem]">
                    Telepsychiatry services are available only to patients who are physically located in Alabama at the time of their appointment.
                </p>
            </div>
        </div>
    </section>

    <section class="bg-white px-5 pb-16 sm:px-8 lg:px-10 lg:pb-20">
        <div class="mx-auto grid max-w-7xl items-center gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:gap-16">
            <div class="lg:pl-6">
                <h2 class="text-balance font-serif text-4xl font-normal leading-tight tracking-[-0.03em] text-brand-green sm:text-5xl">
                    Care From a Familiar Setting
                </h2>
                <p class="mt-5 max-w-xl text-base leading-7 text-slate-700 sm:text-[1.0625rem]">
                    Interactive video and audio can support access to psychiatric care from home. If suitable equipment is not available or an in-person visit is needed, the practice may recommend an office appointment.
                </p>
            </div>
            <div class="overflow-hidden rounded-2xl">
                <img
                    class="aspect-[16/7] w-full object-cover object-[50%_43%]"
                    src="{{ asset('images/telepsychiatry/compassionate-care.webp') }}"
                    alt="A person relaxing beside a sunlit window."
                    width="1800"
                    height="800"
                >
            </div>
        </div>
    </section>

    <section class="relative isolate overflow-hidden">
        <img
            class="absolute inset-0 -z-20 size-full object-cover object-center"
            src="{{ asset('images/home/appointment-office.webp') }}"
            alt=""
            width="2172"
            height="724"
        >
        <div class="absolute inset-0 -z-10 bg-brand-ivory/75 backdrop-blur-[1px]"></div>

        <div class="mx-auto flex max-w-7xl items-center justify-center px-5 py-16 text-center sm:px-8 lg:px-10">
            <div class="max-w-3xl">
                <h2 class="text-balance font-serif text-4xl font-normal tracking-[-0.03em] text-brand-green sm:text-5xl">
                    Schedule a Telepsychiatry Appointment
                </h2>
                <p class="mx-auto mt-3 max-w-xl text-base leading-7 text-slate-800">
                    Schedule an appointment or contact the office to learn more.
                </p>
                <div class="mt-6 flex flex-col justify-center gap-3 sm:flex-row">
                    <x-site.button-link :href="route('appointments')" icon="calendar">
                        Book an Appointment
                    </x-site.button-link>
                    <x-site.button-link :href="route('contact')" variant="outline" icon="phone">
                        Contact Our Office
                    </x-site.button-link>
                </div>
            </div>
        </div>
    </section>
@endsection
