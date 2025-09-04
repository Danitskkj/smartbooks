@props(['href', 'color' => 'blue', 'size' => 'md'])

@php
    $sizes = [
        'sm' => 'px-3 py-1.5 text-xs',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-3 text-base',
    ];

    $colors = [
        'blue' => 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500',
        'green' => 'bg-green-600 hover:bg-green-700 focus:ring-green-500',
        'yellow' => 'bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-500',
        'red' => 'bg-red-600 hover:bg-red-700 focus:ring-red-500',
        'purple' => 'bg-purple-600 hover:bg-purple-700 focus:ring-purple-500',
    ];
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-flex items-center border border-transparent font-medium rounded-md text-white ' . $colors[$color] . ' ' . $sizes[$size] . ' focus:outline-none focus:ring-2 focus:ring-offset-2 shadow-sm transition-colors duration-200']) }}>
    {{ $slot }}
</a>
