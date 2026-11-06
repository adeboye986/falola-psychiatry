@extends('layouts.app')

@section('title', 'Patient Portal | Falola Psychiatry Practice')
@section('meta_description', 'Access the external Tebra/Kareo patient portal for Falola Psychiatry Practice.')
@section('canonical', route('patient-portal'))

@section('content')
    <section class="bg-brand-ivory px-5 py-16 sm:px-8 lg:px-10 lg:py-24">
        <div class="mx-auto max-w-5xl">
            <p class="eyebrow">Patient Portal</p>
            <h1 class="mt-3 text-balance font-serif text-5xl font-normal leading-[0.98] tracking-[-0.035em] text-brand-green sm:text-6xl lg:text-[4.5rem]">
                Access the External Patient Portal
            </h1>
            <p class="mt-6 max-w-3xl text-base leading-7 text-slate-800 sm:text-lg sm:leading-8">
                Existing patients can use Tebra's separate patient portal to access available portal services. Portal authentication remains entirely on Tebra's website.
            </p>

            <div class="mt-10 rounded-3xl border border-brand-sand/80 bg-white px-7 py-9 shadow-[0_12px_34px_rgba(31,50,42,0.07)] sm:px-10">
                @if ($patientPortalUrl !== null)
                    <h2 class="font-serif text-3xl font-normal text-brand-green sm:text-4xl">Continue Securely to Tebra</h2>
                    <p class="mt-3 max-w-2xl text-base leading-7 text-slate-700">
                        The portal opens in a new browser tab. This website does not collect, proxy, or store your portal email address, password, or authenticated session.
                    </p>
                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <x-site.button-link :href="$patientPortalUrl" arrow external>
                            Open Patient Portal
                        </x-site.button-link>
                        <x-site.button-link href="tel:+16593466314" variant="outline" icon="phone">
                            Call for Portal Help
                        </x-site.button-link>
                    </div>
                @else
                    <h2 class="font-serif text-3xl font-normal text-brand-green sm:text-4xl">Portal Link Temporarily Unavailable</h2>
                    <p class="mt-3 max-w-2xl text-base leading-7 text-slate-700">
                        The external portal destination is missing or could not be verified. Contact the office for assistance.
                    </p>
                    <div class="mt-7">
                        <x-site.button-link href="tel:+16593466314" icon="phone">
                            Call (659) 346-6314
                        </x-site.button-link>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
