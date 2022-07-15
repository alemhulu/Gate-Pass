@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-sm text-slate-900 ']) }}>
    {{ $value ?? $slot }}
</label>
