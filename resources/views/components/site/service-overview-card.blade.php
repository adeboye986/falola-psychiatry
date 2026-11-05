@props([
    'name',
    'slug',
    'description',
    'image',
    'alt',
    'position' => 'object-center',
])

<a
    href="{{ route('services.show', ['service' => $slug]) }}"
    {{ $attributes->class(['group grid overflow-hidden rounded-xl border border-brand-sand bg-brand-ivory shadow-[0_5px_16px_rgba(25,48,39,0.08)] transition duration-200 hover:-translate-y-0.5 hover:border-brand-green/30 hover:shadow-[0_10px_24px_rgba(25,48,39,0.12)] focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-brand-green sm:grid-cols-[minmax(10rem,0.9fr)_minmax(0,1.25fr)]']) }}
>
    <div class="aspect-[16/9] overflow-hidden bg-slate-100 sm:aspect-auto">
        <img
            class="size-full object-cover {{ $position }} transition duration-300 group-hover:scale-[1.025]"
            src="{{ asset('images/home/'.$image) }}"
            alt="{{ $alt }}"
            width="720"
            height="440"
            loading="lazy"
        >
    </div>

    <div class="flex min-w-0 flex-col justify-center px-5 py-5 sm:px-6">
        <h3 class="font-serif text-2xl font-normal leading-tight tracking-[-0.015em] text-brand-green">
            {{ $name }}
        </h3>
        <p class="mt-2 text-sm leading-6 text-slate-700 sm:text-[0.9375rem]">
            {{ $description }}
        </p>
        <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-brand-green">
            Learn More
            <svg class="size-4 shrink-0 transition-transform duration-200 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5" />
            </svg>
        </span>
    </div>
</a>
