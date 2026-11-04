@extends('layouts.app')

@section('title', $title.' | '.config('app.name'))
@section('meta_description', $description)

@section('content')
    <section class="max-w-3xl space-y-5">
        <p class="text-sm font-semibold uppercase tracking-wider text-slate-600">Content pending</p>
        <h1 class="text-4xl font-semibold tracking-tight">{{ $title }}</h1>
        <p class="text-lg leading-8 text-slate-700">{{ $description }}</p>
        <p class="rounded-lg border border-amber-200 bg-amber-50 p-5 text-sm leading-6 text-amber-950">
            This page is a structural placeholder only. No medical or professional information has been inferred or added.
        </p>
    </section>
@endsection
