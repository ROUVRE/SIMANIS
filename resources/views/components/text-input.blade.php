@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm',
]) !!}>
