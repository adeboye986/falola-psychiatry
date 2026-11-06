@extends('layouts.app')

@section('title', $service['name'].' | Services | Falola Psychiatry Practice')
@section('meta_description', $service['meta_description'])
@section('canonical', route('services.show', ['service' => $serviceSlug]))

@php
    $appointmentUrl = 'https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057';
@endphp

@section('content')
    <section class="overflow-hidden bg-brand-ivory">
        <div class="mx-auto grid max-w-[90rem] lg:min-h-[25rem] lg:grid-cols-[0.9fr_1.1fr]">
            <div class="flex items-center px-5 py-12 sm:px-8 lg:px-14 lg:py-10 xl:px-20">
                <div class="max-w-xl">
                    <a
                        class="inline-flex items-center gap-2 text-sm font-semibold text-brand-green transition hover:text-brand-green-dark focus-visible:rounded-sm focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-brand-green"
                        href="{{ route('services.index') }}"
                    >
                        <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m5-5-5 5 5 5" />
                        </svg>
                        Back to Services
                    </a>
                    <p class="eyebrow mt-8">Our Services</p>
                    <h1 class="mt-3 text-balance font-serif text-5xl font-normal leading-[0.98] tracking-[-0.035em] text-brand-green sm:text-6xl lg:text-[3.75rem]">
                        {{ $service['name'] }}
                    </h1>
                    <p class="mt-5 max-w-lg text-base leading-7 text-slate-800 sm:text-[1.0625rem]">
                        {{ $service['hero_summary'] }}
                    </p>
                </div>
            </div>

            <div class="h-72 overflow-hidden sm:h-96 lg:h-auto">
                <img
                    class="size-full object-cover"
                    style="object-position: {{ $service['hero_position'] }}"
                    src="{{ asset('images/services/details/'.$service['hero_image']) }}"
                    alt="{{ $service['hero_alt'] }}"
                    width="{{ $service['hero_width'] }}"
                    height="{{ $service['hero_height'] }}"
                    fetchpriority="high"
                >
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto grid max-w-7xl gap-12 px-5 py-14 sm:px-8 lg:grid-cols-[minmax(0,1fr)_22rem] lg:gap-16 lg:px-10 lg:py-20">
            <div class="space-y-10">
                <section aria-labelledby="service-introduction">
                    <h2 id="service-introduction" class="font-serif text-4xl font-normal leading-tight tracking-[-0.025em] text-brand-green sm:text-[2.75rem]">
                        {{ $service['overview_heading'] }}
                    </h2>
                    <p class="mt-4 text-base leading-8 text-slate-700 sm:text-[1.0625rem]">
                        {{ $service['introduction'] }}
                    </p>
                </section>

                <section aria-labelledby="common-concerns">
                    <h2 id="common-concerns" class="font-serif text-4xl font-normal leading-tight tracking-[-0.025em] text-brand-green">
                        Common Concerns
                    </h2>
                    <p class="mt-3 text-base leading-7 text-slate-700">
                        Experiences vary, but general concerns can include:
                    </p>
                    <ul class="mt-5 grid gap-x-10 gap-y-3 sm:grid-cols-2">
                        @foreach ($service['concerns'] as $concern)
                            <li class="flex items-start gap-3 text-base leading-7 text-slate-700">
                                <svg class="mt-1 size-5 shrink-0 text-brand-green" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.78-9.97a.75.75 0 0 0-1.06-1.06L9 10.69 7.28 8.97a.75.75 0 0 0-1.06 1.06l2.25 2.25c.293.293.767.293 1.06 0l4.25-4.25Z" clip-rule="evenodd" />
                                </svg>
                                <span>{{ $concern }}</span>
                            </li>
                        @endforeach
                    </ul>
                </section>

                <section aria-labelledby="evaluation-and-care">
                    <h2 id="evaluation-and-care" class="font-serif text-4xl font-normal leading-tight tracking-[-0.025em] text-brand-green">
                        {{ $service['care_heading'] }}
                    </h2>
                    <p class="mt-4 text-base leading-8 text-slate-700 sm:text-[1.0625rem]">
                        {{ $service['care'] }}
                    </p>
                </section>

                <section aria-labelledby="when-to-seek-help">
                    <h2 id="when-to-seek-help" class="font-serif text-4xl font-normal leading-tight tracking-[-0.025em] text-brand-green">
                        When to Seek Help
                    </h2>
                    <p class="mt-4 text-base leading-8 text-slate-700 sm:text-[1.0625rem]">
                        {{ $service['seek_help'] }}
                    </p>
                    @isset($service['crisis_note'])
                        <p class="mt-4 rounded-xl border border-brand-sand bg-brand-ivory px-5 py-4 text-sm font-medium leading-6 text-slate-800">
                            {{ $service['crisis_note'] }}
                        </p>
                    @endisset
                </section>
            </div>

            <aside class="space-y-5 lg:sticky lg:top-6 lg:self-start" aria-label="Appointment and educational information">
                <div class="rounded-2xl border border-brand-sand bg-brand-ivory p-6 shadow-[0_10px_28px_rgba(31,50,42,0.08)] sm:p-7">
                    <svg class="size-12 text-brand-green" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M29.5 39.5v-5.2c0-2.6 1.1-5 3.1-6.7a15 15 0 1 0-20.2 0 8.8 8.8 0 0 1 3.1 6.7v5.2" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.5 35h14M18.5 40h8" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 18.5c0-2.8 3.5-4.1 5.3-2 1.8-2.1 5.3-.8 5.3 2 0 3-5.3 6.3-5.3 6.3s-5.3-3.3-5.3-6.3Z" />
                    </svg>
                    <h2 class="mt-4 font-serif text-3xl font-normal leading-tight tracking-[-0.02em] text-brand-green">
                        Start With a Conversation
                    </h2>
                    <p class="mt-3 text-base leading-7 text-slate-700">
                        {{ $service['cta_text'] }}
                    </p>
                    <div class="mt-6 grid gap-3 border-t border-brand-green/25 pt-6">
                        <x-site.button-link class="w-full" :href="$appointmentUrl" icon="calendar" arrow external>
                            Book an Appointment
                        </x-site.button-link>
                        <x-site.button-link class="w-full" :href="route('contact')" variant="outline" icon="phone">
                            Contact Our Office
                        </x-site.button-link>
                    </div>
                </div>

                <div class="rounded-2xl border border-brand-sand bg-brand-ivory p-6">
                    <div class="flex items-start gap-3">
                        <svg class="mt-0.5 size-6 shrink-0 text-brand-green" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <circle cx="12" cy="12" r="9" />
                            <path stroke-linecap="round" d="M12 10.5v6M12 7.5h.01" />
                        </svg>
                        <div>
                            <h2 class="font-serif text-xl font-normal text-brand-green">Important Note</h2>
                            <p class="mt-2 text-sm leading-6 text-slate-700">
                                This page provides general educational information. It does not diagnose a condition or confirm that every assessment or treatment described is offered by Falola Psychiatry Practice.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 border-t border-brand-sand pt-4">
                        <p class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-navy">
                            Educational {{ count($service['sources']) === 1 ? 'Source' : 'Sources' }}
                        </p>
                        <ul class="mt-2 space-y-2 text-sm leading-5">
                            @foreach ($service['sources'] as $source)
                                <li>
                                    <a
                                        class="font-medium text-brand-green underline decoration-brand-green/35 underline-offset-4 transition hover:text-brand-green-dark focus-visible:rounded-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green"
                                        href="{{ $source['url'] }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        {{ $source['label'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <section class="border-y border-brand-sand/70 bg-brand-beige">
        <div class="mx-auto grid max-w-7xl gap-7 px-5 py-14 sm:px-8 lg:grid-cols-[1fr_auto] lg:items-center lg:px-10">
            <div class="max-w-2xl">
                <h2 class="text-balance font-serif text-4xl font-normal leading-tight tracking-[-0.03em] text-brand-green sm:text-5xl">
                    Ready to Take the Next Step?
                </h2>
                <p class="mt-3 text-base leading-7 text-slate-800">
                    Schedule an appointment or contact the office to learn more about current service availability.
                </p>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row lg:justify-end">
                <x-site.button-link :href="$appointmentUrl" icon="calendar" arrow external>
                    Book an Appointment
                </x-site.button-link>
                <x-site.button-link :href="route('contact')" variant="outline" icon="phone">
                    Contact Our Office
                </x-site.button-link>
            </div>
        </div>
    </section>
@endsection
