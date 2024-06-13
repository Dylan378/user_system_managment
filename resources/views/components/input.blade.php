@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'focus:border-0 focus:ring-gray-300 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5']) !!}>
