@props([
    'name',
    'slug',
    'image',
    'alt',
])

<a
    href="{{ route('services.show', ['service' => $slug]) }}"
    {{ $attributes->class(['group overflow-hidden rounded-xl border border-brand-sand bg-white shadow-[0_6px_18px_rgba(25,48,39,0.08)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_28px_rgba(25,48,39,0.13)] focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-brand-green']) }}
>
    <img
        class="aspect-[18/5] w-full object-cover transition duration-300 group-hover:scale-[1.025]"
        src="{{ asset('images/home/'.$image) }}"
        alt="{{ $alt }}"
        width="720"
        height="440"
        loading="lazy"
    >
    <span class="flex min-h-12 items-center justify-between gap-4 px-5 py-3 text-base font-semibold leading-tight text-brand-green">
        <span>{{ $name }}</span>
        <svg class="size-4 shrink-0 transition-transform duration-200 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5" />
        </svg>
    </span>
</a>
