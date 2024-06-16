@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 text-yellow-500 hover:text-yellow-900'
            : 'inline-flex items-center px-1 pt-1 border-b-2 text-yellow-900 hover:text-yellow-500';
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
