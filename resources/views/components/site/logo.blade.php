@props([
    'light' => false,
    'compact' => false,
])

<a
    href="{{ route('home') }}"
    aria-label="Falola Psychiatry Practice home"
    {{ $attributes->class(['inline-flex items-center']) }}
>
    <img
        class="shrink-0 object-contain {{ $compact ? 'size-20 sm:size-24' : 'size-32 sm:size-36' }} {{ $light ? 'rounded-xl bg-brand-ivory p-2 shadow-sm' : '' }}"
        src="{{ asset('images/home/logo-mark.png') }}"
        alt="Falola Psychiatry Practice"
        width="260"
        height="260"
    >
</a>
