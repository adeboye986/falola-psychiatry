@props([
    'light' => false,
    'compact' => false,
])

<a
    href="{{ route('home') }}"
    aria-label="Falola Psychiatry Practice home"
    {{ $attributes->class([
        'brand-lockup',
        'brand-lockup-header' => $compact,
        'brand-lockup-light' => $light,
    ]) }}
>
    <img
        class="brand-lockup-image"
        src="{{ asset('images/home/logo-mark.png') }}"
        alt="Falola Psychiatry Practice"
        width="260"
        height="260"
    >
</a>
