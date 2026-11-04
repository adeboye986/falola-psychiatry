@extends('layouts.app')

@section('title', $title.' | '.config('app.name'))
@section('meta_description', $description)

@section('content')
    <section class="mx-auto min-h-[55vh] w-full max-w-6xl px-5 py-16 sm:px-8 lg:px-10 lg:py-24">
        <div class="max-w-3xl space-y-5">
            <p class="eyebrow">Content pending</p>
            <h1 class="font-serif text-4xl font-semibold tracking-tight text-brand-green sm:text-5xl">{{ $title }}</h1>
            <p class="text-lg leading-8 text-slate-700">{{ $description }}</p>
            <p class="rounded-xl border border-amber-200 bg-amber-50 p-5 text-sm leading-6 text-amber-950">
                This page is a structural placeholder only. No medical or professional information has been inferred or added.
            </p>
        </div>
    </section>
@endsection
