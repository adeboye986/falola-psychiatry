@extends('layouts.app')

@section('title', 'Schedule an Appointment | Falola Psychiatry Practice')
@section('meta_description', 'Request an appointment through the established Tebra scheduling system or contact Falola Psychiatry Practice by phone.')
@section('canonical', route('appointments'))

@section('content')
    <section class="border-b border-brand-sand/70 bg-brand-ivory px-5 py-16 sm:px-8 lg:px-10 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <div class="max-w-3xl">
                <p class="eyebrow">Appointments</p>
                <h1 class="mt-3 text-balance font-serif text-5xl font-normal leading-[0.98] tracking-[-0.035em] text-brand-green sm:text-6xl lg:text-[4.5rem]">
                    Schedule an Appointment
                </h1>
                <p class="mt-6 max-w-2xl text-base leading-7 text-slate-800 sm:text-lg sm:leading-8">
                    Use the practice's established Tebra scheduling system to request an available appointment, or contact the office for assistance.
                </p>
            </div>
        </div>
    </section>

    <section class="bg-white px-5 py-16 sm:px-8 lg:px-10 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <div>
                <p class="eyebrow">Online Scheduling</p>
                <h2 class="mt-3 text-balance font-serif text-4xl font-normal tracking-[-0.03em] text-brand-green sm:text-5xl">
                    Request a Time Through Tebra
                </h2>
                <p class="mt-4 max-w-3xl text-base leading-7 text-slate-700">
                    Tebra provides the practice's appointment scheduling experience. Availability, appointment types, and request details are managed within Tebra.
                </p>

                @if ($schedulerUrl !== null)
                    <div class="mt-8 rounded-3xl border border-brand-sand/80 bg-brand-ivory p-6 shadow-[0_12px_34px_rgba(31,50,42,0.07)] sm:p-8">
                        @if ($iframeEnabled)
                            <div
                                x-data="tebraScheduler({ schedulerUrl: {{ Js::from($schedulerUrl) }}, timeoutMs: {{ $schedulerTimeoutMs }} })"
                            >
                                <h3 class="font-serif text-3xl font-normal text-brand-green">Online Scheduler</h3>
                                <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-700">
                                    Use the Tebra scheduler below to request an available appointment.
                                </p>

                                <div
                                    class="mt-6 flex items-center gap-3 rounded-xl border border-brand-green/15 bg-white px-4 py-3 text-sm font-medium text-brand-green"
                                    role="status"
                                    aria-live="polite"
                                    x-show="schedulerLoading"
                                    x-cloak
                                >
                                    <svg class="size-5 animate-spin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" d="M12 3a9 9 0 1 1-8.49 6" />
                                    </svg>
                                    Loading the Tebra scheduler…
                                </div>

                                <div
                                    class="mt-6 rounded-xl border border-amber-300 bg-amber-50 px-5 py-4 text-sm leading-6 text-amber-950"
                                    role="status"
                                    aria-live="polite"
                                    x-show="schedulerDelayed"
                                    x-cloak
                                >
                                    The scheduler is taking longer than expected. It may still load below. You can also use the external scheduling link or call the office.
                                </div>

                                <div class="mt-6 overflow-hidden rounded-2xl border border-brand-sand bg-white shadow-inner" :aria-busy="schedulerLoading.toString()">
                                    <iframe
                                        class="h-[70vh] min-h-[44rem] w-full sm:h-[75vh] lg:min-h-[50rem]"
                                        :src="schedulerUrl"
                                        title="Schedule an appointment with Falola Psychiatry Practice"
                                        referrerpolicy="no-referrer"
                                        x-on:load="markSchedulerLoaded"
                                    ></iframe>
                                </div>
                            </div>
                        @else
                            <h3 class="font-serif text-3xl font-normal text-brand-green">Continue to Online Scheduling</h3>
                            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-700">
                                Embedded scheduling is not enabled. Open the established Tebra scheduling page in a new browser tab to request an appointment.
                            </p>
                        @endif

                        <div class="mt-6 flex flex-col gap-3 border-t border-brand-sand pt-6 sm:flex-row">
                            <x-site.button-link :href="$schedulerUrl" icon="calendar" external>
                                Open Scheduler in a New Window
                            </x-site.button-link>
                            <x-site.button-link href="tel:+16593466314" variant="outline" icon="phone">
                                Call (659) 346-6314
                            </x-site.button-link>
                        </div>
                    </div>
                @else
                    <div class="mt-8 rounded-3xl border border-amber-300 bg-amber-50 px-7 py-8 text-amber-950 sm:px-9">
                        <h3 class="font-serif text-3xl font-normal text-brand-green">Online Scheduling Is Temporarily Unavailable</h3>
                        <p class="mt-3 max-w-2xl text-base leading-7">
                            The scheduling destination is missing or could not be verified. Please contact the office for appointment assistance.
                        </p>
                        <div class="mt-6">
                            <x-site.button-link href="tel:+16593466314" icon="phone">
                                Call (659) 346-6314
                            </x-site.button-link>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection
