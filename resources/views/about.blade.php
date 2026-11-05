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

    $recognition = [
        'Inaugural UAB Engel Scholar Award in Psychiatry',
        'First place, American Psychiatric Association Annual Mind Games',
        'First place, APA Research Colloquium for Junior Investigators',
        'First place, American Society of Clinical Psychopharmacology Clinical Trials Workshop in Psychopharmacology',
        'First place, UAB Annual Research Symposium',
    ];
@endphp

@section('content')
    <section class="overflow-hidden bg-brand-ivory">
        <div class="mx-auto grid max-w-[90rem] lg:min-h-[27rem] lg:grid-cols-[1.02fr_0.98fr]">
            <div class="flex items-center px-5 py-16 sm:px-8 lg:px-14 lg:py-14 xl:px-20">
                <div class="max-w-2xl">
                    <p class="eyebrow">About Falola Psychiatry Practice</p>
                    <h1 class="mt-4 text-pretty font-serif text-5xl font-semibold leading-[0.98] tracking-[-0.035em] text-brand-green sm:text-6xl lg:text-[4rem]">
                        Dr. Michael Falola, M.D., M.P.H.
                    </h1>
                    <p class="mt-5 max-w-xl text-lg leading-8 text-slate-800">
                        A psychiatrist and academic professional with documented clinical, educational, and research experience.
                    </p>
                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <x-site.button-link :href="$appointmentUrl" icon="calendar" external>
                            Book an Appointment
                        </x-site.button-link>
                        <x-site.button-link :href="route('services.index')" variant="outline" arrow>
                            Explore Our Services
                        </x-site.button-link>
                    </div>
                </div>
            </div>

            <div class="min-h-80 lg:min-h-full">
                <img
                    class="size-full object-cover object-[50%_38%]"
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
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 py-16 sm:px-8 lg:grid-cols-[0.82fr_1.18fr] lg:gap-16 lg:px-10 lg:py-18">
            <div class="overflow-hidden rounded-2xl bg-slate-100 shadow-[0_14px_36px_rgba(31,50,42,0.12)]">
                <img
                    class="aspect-[4/3] w-full object-cover object-top"
                    src="{{ asset('images/home/dr-falola.jpg') }}"
                    alt="Professional portrait of Dr. Michael Falola."
                    width="900"
                    height="650"
                    loading="lazy"
                >
            </div>

            <div>
                <p class="eyebrow">Professional Biography</p>
                <h2 class="mt-2 font-serif text-4xl font-semibold leading-tight tracking-[-0.025em] text-brand-green sm:text-5xl">
                    Clinical, Academic, and Research Experience
                </h2>
                <div class="mt-6 space-y-5 text-[1.0625rem] leading-8 text-slate-700">
                    <p>
                        Dr. Michael Falola is a psychiatrist and academic professional with clinical, educational, and research experience. He completed his psychiatry residency at the University of Alabama at Birmingham in 2018.
                    </p>
                    <p>
                        His published professional history includes adult psychiatry, emergency room psychiatry, telepsychiatry, academic psychiatry, and clinical research appointments.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-brand-sand/70 bg-brand-beige">
        <div class="mx-auto grid max-w-7xl gap-12 px-5 py-16 sm:px-8 lg:grid-cols-2 lg:gap-16 lg:px-10">
            <div class="lg:border-r lg:border-brand-green/20 lg:pr-16">
                <p class="eyebrow">Education and Training</p>
                <h2 class="mt-2 font-serif text-4xl font-semibold tracking-[-0.025em] text-brand-green">
                    Documented Training
                </h2>
                <div class="mt-7 rounded-2xl border border-brand-sand bg-white/70 p-6 shadow-sm sm:p-7">
                    <p class="font-serif text-2xl font-semibold text-brand-green">Psychiatry Residency</p>
                    <p class="mt-2 text-lg leading-7 text-slate-800">University of Alabama at Birmingham</p>
                    <p class="mt-1 text-base leading-7 text-slate-600">Completed in 2018</p>
                </div>
            </div>

            <div class="space-y-10">
                <div>
                    <p class="eyebrow">Clinical Experience</p>
                    <h2 class="mt-2 font-serif text-4xl font-semibold tracking-[-0.025em] text-brand-green">
                        Psychiatry Practice
                    </h2>
                    <p class="mt-4 text-[1.0625rem] leading-8 text-slate-700">
                        Dr. Falola's documented appointments include adult psychiatry, emergency room psychiatry, treatment-resistant depression, and telepsychiatry roles from 2018 onward.
                    </p>
                </div>

                <div>
                    <p class="eyebrow">Academic and Research Work</p>
                    <h2 class="mt-2 font-serif text-4xl font-semibold tracking-[-0.025em] text-brand-green">
                        Research Roles and Interests
                    </h2>
                    <p class="mt-4 text-[1.0625rem] leading-8 text-slate-700">
                        He has served as a Principal and Sub-investigator at UAB and Tilda Research. His listed research interests include clinical trials, psychopharmacology, depression, treatment-resistant depression, suicide, Alzheimer's disease, and predictive data analytics.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10">
            <div class="grid gap-12 lg:grid-cols-[0.85fr_1.15fr] lg:gap-16">
                <div>
                    <p class="eyebrow">Publications</p>
                    <h2 class="mt-2 font-serif text-4xl font-semibold tracking-[-0.025em] text-brand-green">
                        Published Work
                    </h2>
                    <p class="mt-4 text-[1.0625rem] leading-8 text-slate-700">
                        The practice's published physician profile states that Dr. Falola has published a psychiatry textbook and multiple research papers.
                    </p>
                    <div class="mt-7 flex flex-col items-start gap-3 sm:flex-row">
                        <x-site.button-link href="https://www.researchgate.net/profile/Michael-Falola" variant="outline" arrow external>
                            View Publications
                        </x-site.button-link>
                        <x-site.button-link href="https://www.psychiatryonline.org/doi/10.1176/appi.pn.2018.6a26" variant="outline" arrow external>
                            In the News
                        </x-site.button-link>
                    </div>
                </div>

                <div class="lg:border-l lg:border-brand-green/20 lg:pl-16">
                    <p class="eyebrow">Professional Recognition</p>
                    <h2 class="mt-2 font-serif text-4xl font-semibold tracking-[-0.025em] text-brand-green">
                        Training and Research Recognition
                    </h2>
                    <ul class="mt-6 space-y-3 text-base leading-7 text-slate-700">
                        @foreach ($recognition as $item)
                            <li class="flex gap-3">
                                <span class="mt-2 size-1.5 shrink-0 rounded-full bg-brand-green" aria-hidden="true"></span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="mt-14 border-t border-brand-sand pt-12">
                <p class="eyebrow">Professional History</p>
                <h2 class="mt-2 font-serif text-4xl font-semibold tracking-[-0.025em] text-brand-green">
                    Current and Past Appointments
                </h2>
                <div class="mt-7 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($appointments as $appointment)
                        <article class="rounded-xl border border-brand-sand bg-brand-ivory p-5">
                            <h3 class="font-serif text-xl font-semibold leading-snug text-brand-green">{{ $appointment['role'] }}</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-700">{{ $appointment['organization'] }}</p>
                            <p class="mt-2 text-xs font-semibold uppercase tracking-[0.12em] text-brand-navy">{{ $appointment['dates'] }}</p>
                        </article>
                    @endforeach
                </div>
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
        <div class="absolute inset-0 -z-10 bg-brand-ivory/75 backdrop-blur-[1px]"></div>

        <div class="mx-auto flex max-w-7xl items-center justify-center px-5 py-16 text-center sm:px-8 lg:px-10">
            <div class="max-w-2xl">
                <h2 class="font-serif text-5xl font-semibold tracking-[-0.03em] text-brand-green">
                    Schedule an Appointment
                </h2>
                <p class="mx-auto mt-4 max-w-xl text-lg leading-8 text-slate-800">
                    Schedule an appointment or contact the office to learn more.
                </p>
                <div class="mt-7 flex flex-col justify-center gap-3 sm:flex-row">
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
