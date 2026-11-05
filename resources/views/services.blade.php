@extends('layouts.app')

@section('title', 'Services | Falola Psychiatry Practice')
@section('meta_description', 'Explore the areas of mental health care listed by Falola Psychiatry Practice, including telepsychiatry for patients located in Alabama.')

@php
    $appointmentUrl = 'https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057';

    $services = [
        [
            'name' => 'ADHD',
            'slug' => 'adhd',
            'image' => 'service-adhd.jpg',
            'alt' => 'A person completing a written checklist.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Anxiety',
            'slug' => 'anxiety',
            'image' => 'service-anxiety.jpg',
            'alt' => 'Portrait of a thoughtful person.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Depression',
            'slug' => 'depression',
            'image' => 'service-depression.jpg',
            'alt' => 'A person sitting thoughtfully on a couch.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Bipolar Disorders',
            'slug' => 'bipolar-disorders',
            'image' => 'service-bipolar.jpg',
            'alt' => 'A conversation in a professional office.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Trauma',
            'slug' => 'trauma',
            'image' => 'service-trauma.jpg',
            'alt' => 'Two people in a therapy conversation.',
            'position' => 'object-center',
        ],
        [
            'name' => 'OCD',
            'slug' => 'ocd',
            'image' => 'service-ocd.jpg',
            'alt' => 'A person completing a written form.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Addiction',
            'slug' => 'addiction',
            'image' => 'service-addiction.jpg',
            'alt' => 'A quiet breakfast setting with coffee.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Schizophrenia',
            'slug' => 'schizophrenia',
            'image' => 'service-schizophrenia.jpg',
            'alt' => 'A quiet home in a green landscape.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Brief Psychotherapies',
            'slug' => 'brief-psychotherapies',
            'image' => 'service-brief-psychotherapies.jpg',
            'alt' => 'Two people talking in a therapy setting.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Academic Coaching',
            'slug' => 'academic-coaching',
            'image' => 'service-academic-coaching.jpg',
            'alt' => 'A graduation cap and diploma.',
            'position' => 'object-center',
        ],
    ];
@endphp

@section('content')
    <section class="overflow-hidden bg-brand-ivory">
        <div class="mx-auto grid max-w-[90rem] lg:min-h-[25rem] lg:grid-cols-[0.9fr_1.1fr]">
            <div class="flex items-center px-5 py-14 sm:px-8 lg:px-14 lg:py-12 xl:px-20">
                <div class="max-w-xl">
                    <p class="eyebrow">Our Services</p>
                    <h1 class="mt-3 text-balance font-serif text-5xl font-normal leading-[0.98] tracking-[-0.035em] text-brand-green sm:text-6xl lg:text-[3.75rem]">
                        Comprehensive Psychiatric Services
                    </h1>
                    <p class="mt-5 max-w-lg text-base leading-7 text-slate-800 sm:text-[1.0625rem]">
                        Comprehensive and compassionate care with a focus on empathy and respect. Flexible hours, anywhere in Alabama via telepsychiatry.
                    </p>
                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <x-site.button-link :href="$appointmentUrl" icon="calendar" external>
                            Book an Appointment
                        </x-site.button-link>
                        <x-site.button-link :href="route('about')" variant="outline" arrow>
                            About Our Practice
                        </x-site.button-link>
                    </div>
                </div>
            </div>

            <div class="h-72 overflow-hidden sm:h-96 lg:h-auto">
                <img
                    class="size-full object-cover object-center"
                    src="{{ asset('images/home/appointment-office.webp') }}"
                    alt="A calm office seating area."
                    width="2172"
                    height="724"
                    fetchpriority="high"
                >
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-20">
            <div class="mx-auto max-w-3xl text-center">
                <p class="eyebrow">Our Services</p>
                <h2 class="mt-2 text-balance font-serif text-4xl font-normal leading-tight tracking-[-0.025em] text-brand-green sm:text-5xl">
                    Areas of Care and Treatment
                </h2>
                <p class="mt-4 text-base leading-7 text-slate-700 sm:text-[1.0625rem]">
                    Explore the areas of care listed by Falola Psychiatry Practice.
                </p>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-5 xl:grid-cols-2 xl:gap-6">
                @foreach ($services as $service)
                    <x-site.service-overview-card
                        :name="$service['name']"
                        :slug="$service['slug']"
                        :image="$service['image']"
                        :alt="$service['alt']"
                        :position="$service['position']"
                    />
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white px-5 pb-16 sm:px-8 lg:px-10 lg:pb-20">
        <div class="mx-auto grid max-w-6xl overflow-hidden rounded-3xl bg-brand-green shadow-[0_18px_45px_rgba(0,61,45,0.18)] lg:grid-cols-[1.05fr_0.95fr]">
            <div class="aspect-video lg:aspect-auto lg:min-h-[21rem]">
                <img
                    class="size-full object-cover"
                    src="{{ asset('images/home/telepsychiatry.jpg') }}"
                    alt="A woman participating in a video consultation from home."
                    width="1200"
                    height="720"
                    loading="lazy"
                >
            </div>

            <div class="flex items-center px-7 py-10 text-white sm:px-10 lg:px-12 lg:py-12">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-lime">Telepsychiatry</p>
                    <h2 class="mt-2 text-balance font-serif text-4xl font-normal leading-tight tracking-[-0.02em] lg:text-[2.75rem]">
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
                <h2 class="text-balance font-serif text-5xl font-normal tracking-[-0.03em] text-brand-green">
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
