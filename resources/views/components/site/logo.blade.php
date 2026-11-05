@props([
    'light' => false,
    'compact' => false,
])

<a
    href="{{ route('home') }}"
    aria-label="Falola Psychiatry Practice home"
    {{ $attributes->class(['brand-lockup', 'brand-lockup-light' => $light]) }}
>
    <span class="brand-lockup-mark" aria-hidden="true">
        <img src="{{ asset('images/home/logo-mark.png') }}" alt="" width="260" height="260">
    </span>
    <span class="brand-lockup-wordmark" aria-hidden="true">
        <img src="{{ asset('images/home/logo-mark.png') }}" alt="" width="260" height="260">
    </span>
    <span class="sr-only">Falola Psychiatry Practice</span>
</a>
