@props(['active'])

@php
$classes = ($active ?? false)
? 'bg-blue-600 hover:bg-blue-700 text-white group flex items-center px-2 py-2 text-sm font-semibold rounded-md'
: 'text-gray-600 hover:bg-blue-600 hover:text-white group flex items-center px-2 py-2 text-sm font-semibold rounded-md';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>