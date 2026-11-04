@props([
    'light' => false,
    'compact' => false,
])

<a
    href="{{ route('home') }}"
    aria-label="Falola Psychiatry Practice home"
    {{ $attributes->class(['inline-flex items-center gap-3']) }}
>
    <img
        class="size-12 shrink-0 object-contain sm:size-14 {{ $light ? 'brightness-0 invert' : '' }}"
        src="{{ asset('images/home/logo-mark.png') }}"
        alt=""
        width="260"
        height="260"
    >
    <span class="font-semibold uppercase leading-[0.92] tracking-[0.035em] {{ $light ? 'text-white' : 'text-brand-navy' }} {{ $compact ? 'text-sm sm:text-base' : 'text-base sm:text-lg' }}">
        <span class="block">Falola</span>
        <span class="block">Psychiatry</span>
        <span class="block">Practice</span>
    </span>
</a>
