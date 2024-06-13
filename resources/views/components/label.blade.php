@props(['value'])

<label {{ $attributes->merge(['class' => 'block mb-2 text-sm text-gray-900 text-left']) }}>
    {{ $value ?? $slot }}
</label>