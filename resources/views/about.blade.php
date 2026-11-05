@extends('layouts.app')

@section('title', 'About Dr. Michael Falola | Falola Psychiatry Practice')
@section('meta_description', 'Learn about Dr. Michael Falola\'s documented psychiatry training, clinical appointments, academic work, research interests, and publications.')

@php
    $appointmentUrl = 'https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057';

    $appointments = [
        ['role' => 'Psychiatrist', 'organization' => 'Falola Psychiatry Practice', 'dates' => '2025–Present'],
        ['role' => 'Telepsychiatrist', 'organization' => 'Alsana Eating Recovery Care, Birmingham, Alabama', 'dates' => '2021–2025'],
        ['role' => 'Assistant Professor, Department of Psychiatry', 'organization' => 'University of Alabama at Birmingham', 'dates' => '2018–2020; 2022–2024'],
        ['role' => 'Principal Investigator', 'organization' => 'Tilda Research Inc.', 'dates' => '2022–2024'],
        ['role' => 'Telepsychiatrist', 'organization' => 'MindCare Solutions Group, Inc., Tennessee', 'dates' => '2020–2023'],
        ['role' => 'Adult Psychiatrist', 'organization' => 'Regional Medical Center, Anniston, Alabama', 'dates' => '2020–2021'],
        ['role' => 'Adult Psychiatrist', 'organization' => 'River Region Psychiatry Associates, Montgomery, Alabama', 'dates' => '2020–2021; 2023–2025'],
        ['role' => 'Adult Psychiatrist', 'organization' => 'Treatment Resistant Depression Clinic, UAB', 'dates' => '2018–2020'],
        ['role' => 'Emergency Room Psychiatrist', 'organization' => 'Department of Psychiatry, UAB', 'dates' => '2018–2020'],
    ];
@endphp

@section('content')
    <section class="overflow-hidden bg-brand-ivory">
        <div class="mx-auto grid max-w-[90rem] lg:h-[27rem] lg:grid-cols-[1.08fr_0.92fr]">
            <div class="flex items-center px-5 py-14 sm:px-8 lg:px-14 lg:py-10 xl:px-20">
                <div class="max-w-xl">
                    <p class="eyebrow">About Falola Psychiatry Practice</p>
                    <h1 class="mt-3 font-serif text-5xl font-semibold leading-[0.98] tracking-[-0.035em] text-brand-green lg:text-[3.5rem]">
                        Dr. Michael Falola, M.D., M.P.H.
                    </h1>
                    <p class="mt-4 max-w-lg text-[1.0625rem] leading-7 text-slate-800">
                        A psychiatrist and academic professional with documented clinical, educational, and research experience.
                    </p>
                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <x-site.button-link :href="$appointmentUrl" icon="calendar" external>
                            Book an Appointment
                        </x-site.button-link>
                        <x-site.button-link :href="route('services.index')" variant="outline" arrow>
                            Explore Our Services
                        </x-site.button-link>
                    </div>
                </div>
            </div>

            <div class="h-80 overflow-hidden lg:h-full">
                <img
                    class="h-full w-full object-cover object-[50%_39%]"
                    src="{{ asset('images/about/dr-falola-candid.jpg') }}"
                    alt="Dr. Michael Falola seated indoors."
                    width="860"
                    height="1128"
                    fetchpriority="high"
                >
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto grid max-w-6xl items-center gap-10 px-5 py-12 sm:px-8 lg:grid-cols-[0.82fr_1.18fr] lg:gap-14 lg:px-10">
            <div class="mx-auto w-full max-w-lg overflow-hidden rounded-xl bg-slate-100 shadow-[0_10px_28px_rgba(31,50,42,0.1)] lg:max-w-none">
                <img
                    class="aspect-[4/3] w-full object-cover object-[50%_28%]"
                    src="{{ asset('images/about/dr-falola-professional.jpg') }}"
                    alt="Professional portrait of Dr. Michael Falola."
                    width="978"
                    height="1170"
                    loading="lazy"
                >
            </div>

            <div>
                <h2 class="font-serif text-4xl font-semibold leading-tight tracking-[-0.025em] text-brand-green sm:text-[2.75rem]">
                    Professional Biography
                </h2>
                <div class="mt-5 space-y-4 text-base leading-7 text-slate-700 sm:text-[1.0625rem] sm:leading-8">
                    <p>
                        Dr. Michael Falola is a psychiatrist and academic professional with clinical, educational, and research experience. He completed his psychiatry residency at the University of Alabama at Birmingham in 2018.
                    </p>
                    <p>
                        His published professional history includes adult psychiatry, emergency room psychiatry, telepsychiatry, academic psychiatry, and clinical research appointments. He has also served as a Principal and Sub-investigator at UAB and Tilda Research.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-brand-sand/70 bg-brand-beige">
        <div class="mx-auto grid max-w-6xl gap-12 px-5 py-12 sm:px-8 lg:grid-cols-[0.95fr_1.05fr] lg:gap-14 lg:px-10">
            <div class="lg:border-r lg:border-brand-green/20 lg:pr-14">
                <h2 class="font-serif text-4xl font-semibold tracking-[-0.025em] text-brand-green">
                    Education and Training
                </h2>
                <div class="mt-7 flex items-start gap-5">
                    <span class="grid size-14 shrink-0 place-items-center rounded-xl bg-white/65 text-brand-green" aria-hidden="true">
                        <svg class="size-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m3 9 9-4 9 4-9 4-9-4Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 11v4.25c2.9 2.3 7.6 2.3 10.5 0V11M21 9v5" />
                        </svg>
                    </span>
                    <div>
                        <h3 class="font-serif text-2xl font-semibold text-brand-green">Psychiatry Residency</h3>
                        <p class="mt-1 text-base leading-7 text-slate-800">University of Alabama at Birmingham</p>
                        <p class="text-sm leading-6 text-slate-600">Completed in 2018</p>
                    </div>
                </div>
            </div>

            <div class="space-y-8">
                <div>
                    <h2 class="font-serif text-3xl font-semibold tracking-[-0.025em] text-brand-green">
                        Clinical Experience
                    </h2>
                    <p class="mt-3 text-base leading-7 text-slate-700">
                        Dr. Falola's documented appointments include adult psychiatry, emergency room psychiatry, treatment-resistant depression, and telepsychiatry roles from 2018 onward.
                    </p>
                </div>

                <div>
                    <h2 class="font-serif text-3xl font-semibold tracking-[-0.025em] text-brand-green">
                        Academic and Research Work
                    </h2>
                    <p class="mt-3 text-base leading-7 text-slate-700">
                        His listed research interests include clinical trials, psychopharmacology, depression, treatment-resistant depression, suicide, Alzheimer's disease, and predictive data analytics.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto grid max-w-6xl gap-12 px-5 py-12 sm:px-8 lg:grid-cols-[0.9fr_1.1fr] lg:gap-14 lg:px-10">
            <div class="lg:border-r lg:border-brand-green/20 lg:pr-14">
                <h2 class="font-serif text-4xl font-semibold tracking-[-0.025em] text-brand-green">
                    Publications
                </h2>
                <p class="mt-4 text-base leading-7 text-slate-700">
                    The practice's published physician profile states that Dr. Falola has published a psychiatry textbook and multiple research papers.
                </p>
                <div class="mt-6 flex flex-wrap items-center gap-5">
                    <x-site.button-link href="https://www.researchgate.net/profile/Michael-Falola" variant="outline" arrow external>
                        View Publications
                    </x-site.button-link>
                    <a
                        class="text-sm font-semibold text-brand-green underline decoration-brand-green/35 underline-offset-4 transition hover:text-brand-green-dark"
                        href="https://www.psychiatryonline.org/doi/10.1176/appi.pn.2018.6a26"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        In the News
                    </a>
                </div>
            </div>

            <div>
                <h2 class="font-serif text-4xl font-semibold leading-tight tracking-[-0.025em] text-brand-green">
                    Professional Appointments and Recognition
                </h2>
                <p class="mt-4 text-base leading-7 text-slate-700">
                    During training, Dr. Falola received the inaugural UAB Engel Scholar Award in Psychiatry and first-place recognition in the American Psychiatric Association Annual Mind Games, APA Research Colloquium for Junior Investigators, American Society of Clinical Psychopharmacology Clinical Trials Workshop in Psychopharmacology, and UAB Annual Research Symposium.
                </p>

                <details class="group mt-6 rounded-xl border border-brand-sand bg-brand-ivory">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 px-5 py-4 font-semibold text-brand-green focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green">
                        <span>Current and Past Appointments</span>
                        <svg class="size-4 shrink-0 transition group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                        </svg>
                    </summary>
                    <div class="grid gap-x-8 border-t border-brand-sand px-5 py-4 md:grid-cols-2">
                        @foreach ($appointments as $appointment)
                            <div class="border-b border-brand-sand/70 py-3 last:border-b-0 md:[&:nth-last-child(-n+2)]:border-b-0">
                                <h3 class="font-serif text-lg font-semibold leading-snug text-brand-green">{{ $appointment['role'] }}</h3>
                                <p class="mt-1 text-sm leading-5 text-slate-700">{{ $appointment['organization'] }}</p>
                                <p class="mt-1 text-xs font-semibold uppercase tracking-[0.1em] text-brand-navy">{{ $appointment['dates'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </details>
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
            loading="lazy"
        >
        <div class="absolute inset-0 -z-10 bg-brand-ivory/70 backdrop-blur-[1px]"></div>

        <div class="mx-auto flex max-w-7xl items-center justify-center px-5 py-14 text-center sm:px-8 lg:px-10">
            <div class="max-w-2xl">
                <h2 class="font-serif text-5xl font-semibold tracking-[-0.03em] text-brand-green">
                    Schedule an Appointment
                </h2>
                <p class="mx-auto mt-3 max-w-xl text-base leading-7 text-slate-800">
                    Schedule an appointment or contact the office to learn more.
                </p>
                <div class="mt-6 flex flex-col justify-center gap-3 sm:flex-row">
                    <x-site.button-link :href="$appointmentUrl" icon="calendar" external>
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
