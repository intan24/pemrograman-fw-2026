@props(['stock' => 0])

@php
    if ($stock > 10) {
        $label = 'Aman';
        $classes = 'bg-green-100 text-green-800 border-green-300';
    } elseif ($stock > 0) {
        $label = 'Menipis';
        $classes = 'bg-yellow-100 text-yellow-800 border-yellow-300';
    } else {
        $label = 'Habis';
        $classes = 'bg-red-100 text-red-800 border-red-300';
    }
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold border ' . $classes]) }}>
    {{ $label }} ({{ $stock }})
</span>