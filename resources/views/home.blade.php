@extends('layouts.app')

@section('title', 'Falola Psychiatry Practice | Mental Health Care')
@section('meta_description', 'Comprehensive and compassionate mental health care with a focus on empathy and respect, available in Alabama via telepsychiatry.')

@php
    $appointmentUrl = 'https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057';

    $services = [
        [
            'name' => 'ADHD',
            'slug' => 'adhd',
            'image' => 'service-adhd.jpg',
            'alt' => 'A person completing a written checklist.',
        ],
        [
            'name' => 'Anxiety',
            'slug' => 'anxiety',
            'image' => 'service-anxiety.jpg',
            'alt' => 'Portrait of a thoughtful person.',
        ],
        [
            'name' => 'Depression',
            'slug' => 'depression',
            'image' => 'service-depression.jpg',
            'alt' => 'A person sitting thoughtfully on a couch.',
        ],
        [
            'name' => 'Bipolar Disorders',
            'slug' => 'bipolar-disorders',
            'image' => 'service-bipolar.jpg',
            'alt' => 'A conversation in a professional office.',
        ],
        [
            'name' => 'Trauma',
            'slug' => 'trauma',
            'image' => 'service-trauma.jpg',
            'alt' => 'Two people in a therapy conversation.',
        ],
        [
            'name' => 'OCD',
            'slug' => 'ocd',
            'image' => 'service-ocd.jpg',
            'alt' => 'A person completing a written form.',
        ],
        [
            'name' => 'Addiction',
            'slug' => 'addiction',
            'image' => 'service-addiction.jpg',
            'alt' => 'A quiet breakfast setting with coffee.',
        ],
        [
            'name' => 'Schizophrenia',
            'slug' => 'schizophrenia',
            'image' => 'service-schizophrenia.jpg',
            'alt' => 'A quiet home in a green landscape.',
        ],
        [
            'name' => 'Brief Psychotherapies',
            'slug' => 'brief-psychotherapies',
            'image' => 'service-brief-psychotherapies.jpg',
            'alt' => 'Two people talking in a therapy setting.',
        ],
        [
            'name' => 'Academic Coaching',
            'slug' => 'academic-coaching',
            'image' => 'service-academic-coaching.jpg',
            'alt' => 'A graduation cap and diploma.',
        ],
    ];

    $insurers = [
        'Medicare',
        'United Health care',
        'Blue Cross Blue Shield',
        'Aetna',
        'Curative',
        'Cigna',
        'ChampVa',
        'Viva',
    ];
@endphp

@section('content')
    <section class="relative isolate overflow-hidden bg-brand-ivory">
        <img
            class="absolute inset-0 -z-20 size-full object-cover object-[68%_center]"
            src="{{ asset('images/home/hero-mountains.webp') }}"
            alt=""
            width="2172"
            height="724"
            fetchpriority="high"
        >
        <div class="absolute inset-0 -z-10 bg-[linear-gradient(90deg,rgba(251,248,242,1)_0%,rgba(251,248,242,0.96)_32%,rgba(251,248,242,0.68)_48%,rgba(251,248,242,0.08)_72%)] max-md:bg-[linear-gradient(90deg,rgba(251,248,242,0.98)_0%,rgba(251,248,242,0.9)_58%,rgba(251,248,242,0.42)_100%)]"></div>

        <div class="mx-auto flex min-h-[36rem] max-w-7xl items-center px-5 py-20 sm:px-8 md:min-h-[38rem] lg:min-h-[42rem] lg:px-10">
            <div class="max-w-3xl">
                <p class="eyebrow">Falola Psychiatry Practice</p>
                <h1 class="mt-4 max-w-[50rem] text-balance font-serif text-5xl font-semibold leading-[0.98] tracking-[-0.035em] text-brand-green sm:text-6xl lg:text-[4.75rem] xl:text-[5rem]">
                    Mental Health Care When You Need It
                </h1>
                <p class="mt-6 max-w-2xl text-base leading-7 text-slate-800 sm:text-lg">
                    Comprehensive and compassionate care with a focus on empathy and respect. Flexible hours, anywhere in Alabama via telepsychiatry.
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
    </section>

    <section class="bg-white">
        <div class="mx-auto grid max-w-7xl items-center gap-14 px-5 py-24 sm:px-8 lg:grid-cols-[1.08fr_0.92fr] lg:gap-24 lg:px-10 lg:py-28">
            <div class="overflow-hidden rounded-2xl bg-slate-100 shadow-[0_14px_36px_rgba(31,50,42,0.12)]">
                <img
                    class="aspect-[4/3] w-full object-cover object-top"
                    src="{{ asset('images/home/dr-falola.jpg') }}"
                    alt="Dr. Michael Falola wearing a white physician coat."
                    width="900"
                    height="650"
                    loading="lazy"
                >
            </div>

            <div>
                <p class="eyebrow">Meet Your Psychiatrist</p>
                <h2 class="mt-3 font-serif text-4xl font-semibold leading-tight tracking-[-0.025em] text-brand-green sm:text-5xl">
                    Dr. Michael Falola, M.D., M.P.H.
                </h2>
                <p class="mt-5 max-w-2xl text-base leading-7 text-slate-700 sm:text-lg">
                    Dr. Falola is a psychiatrist and academic professional with extensive clinical, educational, and research experience. His work has included clinical care, academic psychiatry, and research.
                </p>
                <div class="mt-7">
                    <x-site.button-link :href="route('about')" arrow>
                        Learn More About Dr. Falola
                    </x-site.button-link>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-brand-ivory">
        <div class="mx-auto max-w-7xl px-5 py-24 sm:px-8 lg:px-10 lg:py-32">
            <div class="mx-auto max-w-3xl text-center">
                <p class="eyebrow">Our Services</p>
                <h2 class="mt-2 font-serif text-4xl font-semibold leading-tight tracking-[-0.025em] text-brand-green sm:text-5xl">
                    Comprehensive Psychiatric Services
                </h2>
                <p class="mt-3 text-base leading-7 text-slate-700 sm:text-lg">
                    Explore the areas of care offered by Falola Psychiatry Practice.
                </p>
            </div>

            <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
                @foreach ($services as $service)
                    <x-site.service-card
                        :name="$service['name']"
                        :slug="$service['slug']"
                        :image="$service['image']"
                        :alt="$service['alt']"
                    />
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white px-5 py-24 sm:px-8 lg:px-10 lg:py-28">
        <div class="mx-auto grid max-w-7xl overflow-hidden rounded-3xl bg-brand-green shadow-[0_18px_45px_rgba(0,61,45,0.18)] lg:grid-cols-[1.12fr_0.88fr]">
            <div class="aspect-[16/10] lg:aspect-auto lg:min-h-[30rem]">
                <img
                    class="size-full object-cover"
                    src="{{ asset('images/home/telepsychiatry.jpg') }}"
                    alt="A woman participating in a video consultation from home."
                    width="1200"
                    height="720"
                    loading="lazy"
                >
            </div>

            <div class="relative flex items-center overflow-hidden px-7 py-12 text-white sm:px-10 lg:px-16 lg:py-16">
                <div class="relative">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-lime">Telepsychiatry</p>
                    <h2 class="mt-2 max-w-xl font-serif text-4xl font-semibold leading-tight tracking-[-0.02em] sm:text-5xl">
                        Convenient Virtual Care
                    </h2>
                    <p class="mt-4 max-w-xl text-base leading-7 text-white/85 sm:text-lg">
                        Interactive video and audio care from the comfort of home for patients who are physically located in Alabama during their appointment.
                    </p>
                    <div class="mt-7">
                        <x-site.button-link :href="route('telepsychiatry')" variant="light" arrow>
                            Learn More About Telepsychiatry
                        </x-site.button-link>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-brand-sand/70 bg-brand-beige">
        <div class="mx-auto grid max-w-7xl gap-12 px-5 py-20 sm:px-8 lg:grid-cols-[0.75fr_1.65fr] lg:items-center lg:px-10 lg:py-24">
            <div class="lg:border-r lg:border-brand-green/30 lg:pr-10">
                <h2 class="font-serif text-4xl font-semibold leading-none tracking-[-0.025em] text-brand-green sm:text-5xl">
                    Accepted Insurance
                </h2>
                <p class="mt-4 max-w-sm text-base leading-7 text-slate-700">
                    The existing practice website identifies these eight insurance providers.
                </p>
            </div>

            <div>
                <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
                    @foreach ($insurers as $insurer)
                        <x-site.insurance-logo :name="$insurer" />
                    @endforeach
                </div>
                <p class="mt-4 text-xs leading-5 text-slate-600">
                    Insurance participation varies by plan and must be confirmed directly with the practice and your insurer before scheduling.
                </p>
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

        <div class="mx-auto flex max-w-7xl items-center justify-center px-5 py-28 text-center sm:px-8 lg:px-10 lg:py-36">
            <div class="max-w-2xl">
                <h2 class="font-serif text-5xl font-semibold tracking-[-0.03em] text-brand-green sm:text-6xl">
                    Take the Next Step
                </h2>
                <p class="mx-auto mt-4 max-w-xl text-base leading-7 text-slate-800 sm:text-lg">
                    Schedule an appointment or contact our office to learn more.
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
