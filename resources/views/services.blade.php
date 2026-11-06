@extends('layouts.app')

@section('title', 'Services | Falola Psychiatry Practice')
@section('meta_description', 'Explore the areas of mental health care listed by Falola Psychiatry Practice, including telepsychiatry for patients located in Alabama.')

@php

    $services = [
        [
            'name' => 'ADHD',
            'slug' => 'adhd',
            'description' => 'Support for patterns of inattention, hyperactivity, and impulsivity that can affect daily life.',
            'image' => 'service-adhd.jpg',
            'alt' => 'A person completing a written checklist.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Anxiety',
            'slug' => 'anxiety',
            'description' => 'Care for persistent worry, fear, or dread that can interfere with everyday activities.',
            'image' => 'service-anxiety.jpg',
            'alt' => 'Portrait of a thoughtful person.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Depression',
            'slug' => 'depression',
            'description' => 'Care for symptoms that can affect mood, thinking, sleep, work, and other daily activities.',
            'image' => 'service-depression.jpg',
            'alt' => 'A person sitting thoughtfully on a couch.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Bipolar Disorders',
            'slug' => 'bipolar-disorders',
            'description' => 'Care related to significant changes in mood, energy, activity levels, and concentration.',
            'image' => 'service-bipolar.jpg',
            'alt' => 'A conversation in a professional office.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Trauma',
            'slug' => 'trauma',
            'description' => 'Support for lasting emotional or functional effects of harmful or threatening experiences.',
            'image' => 'service-trauma.jpg',
            'alt' => 'Two people in a therapy conversation.',
            'position' => 'object-center',
        ],
        [
            'name' => 'OCD',
            'slug' => 'ocd',
            'description' => 'Care for recurring, unwanted thoughts and repetitive behaviors that may cause distress.',
            'image' => 'service-ocd.jpg',
            'alt' => 'A person completing a written form.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Addiction',
            'slug' => 'addiction',
            'description' => 'Support for substance-use concerns that may continue despite harmful consequences.',
            'image' => 'service-addiction.jpg',
            'alt' => 'A quiet breakfast setting with coffee.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Schizophrenia',
            'slug' => 'schizophrenia',
            'description' => 'Care related to a serious mental illness that can affect thinking, feeling, and behavior.',
            'image' => 'service-schizophrenia.jpg',
            'alt' => 'A quiet home in a green landscape.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Brief Psychotherapies',
            'slug' => 'brief-psychotherapies',
            'description' => 'Time-limited, focused psychotherapy intended to address defined concerns and goals.',
            'image' => 'service-brief-psychotherapies.jpg',
            'alt' => 'Two people talking in a therapy setting.',
            'position' => 'object-center',
        ],
        [
            'name' => 'Academic Coaching',
            'slug' => 'academic-coaching',
            'description' => 'Support focused on study strategies, time management, organization, and academic goals.',
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
                    <h1 class="text-balance font-serif text-5xl font-normal leading-[0.98] tracking-[-0.035em] text-brand-green sm:text-6xl lg:text-[3.75rem]">
                        Comprehensive Psychiatric Services
                    </h1>
                    <p class="mt-5 max-w-lg text-base leading-7 text-slate-800 sm:text-[1.0625rem]">
                        Comprehensive and compassionate care with a focus on empathy and respect. Flexible hours, anywhere in Alabama via telepsychiatry.
                    </p>
                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <x-site.button-link :href="route('appointments')" icon="calendar">
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
                    class="size-full object-cover object-[58%_48%]"
                    src="{{ asset('images/services/hero-consultation-room.webp') }}"
                    alt="A comfortable armchair beside a plant and side table in a calm consultation room."
                    width="1800"
                    height="1200"
                    fetchpriority="high"
                >
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-20">
            <div class="mx-auto max-w-3xl text-center">
                <h2 class="text-balance font-serif text-4xl font-normal leading-tight tracking-[-0.025em] text-brand-green sm:text-5xl">
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
                        :description="$service['description']"
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
                    <h2 class="text-balance font-serif text-4xl font-normal leading-tight tracking-[-0.02em] lg:text-[2.75rem]">
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
