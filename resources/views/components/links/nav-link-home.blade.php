@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex gap-2 text-center items-center text-accent leading-4 border-b border-accent py-2'
            : 'inline-flex gap-2 text-center items-center text-white hover:text-accent leading-4 transition duration-150 ease-in-out py-2 border-b hover:border-accent border-transparent';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
