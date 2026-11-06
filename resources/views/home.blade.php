@extends('layouts.app')

@section('title', 'Falola Psychiatry Practice | Mental Health Care')
@section('meta_description', 'Comprehensive and compassionate mental health care with a focus on empathy and respect, available in Alabama via telepsychiatry.')

@php

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

        <div class="mx-auto flex min-h-[32rem] max-w-7xl items-center px-5 py-16 sm:px-8 lg:min-h-[28rem] lg:px-10 lg:py-14">
            <div class="max-w-xl">
                <h1 class="text-balance font-serif text-5xl font-normal leading-[0.95] tracking-[-0.035em] text-brand-green sm:text-6xl lg:text-[3.75rem] xl:text-[4rem]">
                    Evidence-Based Mental Health Care for Adults
                </h1>
                <p class="mt-4 max-w-lg text-base leading-6 text-slate-800 sm:text-lg sm:leading-7">
                    Comprehensive and compassionate care with a focus on empathy and respect. Flexible hours, anywhere in Alabama via telepsychiatry.
                </p>
                <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                    <x-site.button-link :href="route('appointments')" icon="calendar">
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
        <div class="mx-auto grid max-w-7xl items-center gap-10 px-5 py-14 sm:px-8 lg:grid-cols-[0.95fr_1.45fr] lg:gap-14 lg:px-10 lg:py-10">
            <div class="overflow-hidden rounded-2xl bg-slate-100 shadow-[0_14px_36px_rgba(31,50,42,0.12)]">
                <img
                    class="aspect-[3/2] w-full object-cover object-top"
                    src="{{ asset('images/home/dr-falola.jpg') }}"
                    alt="Dr. Michael Falola wearing a white physician coat."
                    width="900"
                    height="650"
                    loading="lazy"
                >
            </div>

            <div>
                <h2 class="text-pretty font-serif text-4xl font-normal leading-tight tracking-[-0.025em] text-brand-green lg:text-[2.75rem]">
                    Dr. Michael Falola, M.D., M.P.H.
                </h2>
                <p class="mt-4 max-w-2xl text-[1.0625rem] leading-7 text-slate-700 lg:text-lg">
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
        <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-14">
            <div class="mx-auto max-w-3xl text-center">
                <h2 class="font-serif text-4xl font-normal leading-tight tracking-[-0.025em] text-brand-green lg:text-[2.75rem]">
                    Comprehensive Psychiatric Services
                </h2>
                <p class="mt-3 text-[1.0625rem] leading-7 text-slate-700 sm:text-lg">
                    Explore the areas of care offered by Falola Psychiatry Practice.
                </p>
            </div>

            <div class="mt-8 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3 lg:gap-6">
                @foreach ($services as $service)
                    <x-site.service-card
                        @class(['lg:col-start-2' => $loop->last])
                        :name="$service['name']"
                        :slug="$service['slug']"
                        :image="$service['image']"
                        :alt="$service['alt']"
                    />
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white px-5 py-16 sm:px-8 lg:px-10 lg:py-14">
        <div class="mx-auto grid max-w-7xl overflow-hidden rounded-3xl bg-brand-green shadow-[0_18px_45px_rgba(0,61,45,0.18)] lg:grid-cols-[1fr_1.2fr]">
            <div class="aspect-video lg:aspect-auto lg:min-h-[19rem]">
                <img
                    class="size-full object-cover"
                    src="{{ asset('images/home/telepsychiatry.jpg') }}"
                    alt="A woman participating in a video consultation from home."
                    width="1200"
                    height="720"
                    loading="lazy"
                >
            </div>

            <div class="relative flex items-center overflow-hidden px-7 py-10 text-white sm:px-10 lg:px-14 lg:py-12">
                <div class="relative">
                    <h2 class="max-w-xl font-serif text-4xl font-normal leading-tight tracking-[-0.02em] lg:text-[2.75rem]">
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
        <div class="mx-auto grid max-w-7xl gap-8 px-5 py-12 sm:px-8 lg:grid-cols-[0.7fr_1.7fr] lg:items-center lg:px-10 lg:py-10">
            <div class="lg:border-r lg:border-brand-green/30 lg:pr-10">
                <h2 class="font-serif text-4xl font-normal leading-none tracking-[-0.025em] text-brand-green">
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

        <div class="mx-auto flex max-w-7xl items-center justify-center px-5 py-16 text-center sm:px-8 lg:px-10">
            <div class="max-w-2xl">
                <h2 class="font-serif text-5xl font-normal tracking-[-0.03em] text-brand-green">
                    Take the Next Step
                </h2>
                <p class="mx-auto mt-4 max-w-xl text-base leading-7 text-slate-800 sm:text-lg">
                    Schedule an appointment or contact our office to learn more.
                </p>
                <div class="mt-7 flex flex-col justify-center gap-3 sm:flex-row">
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
