@props(['active' => false])

@php
    $classes = 'block text-left px-3 text-sm leading-6 focus:text-white hover:text-white focus:bg-blue-500 hover:bg-blue-500';

    if($active) $classes .= ' bg-blue-500 text-white';
@endphp

<a {{ $attributes(['class' => $classes]) }}
>{{ $slot }}</a>
