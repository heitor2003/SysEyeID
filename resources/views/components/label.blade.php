@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-black text-black']) }}>
    {{ $value ?? $slot }}
</label>
