@props(['value'])

<label {{ $attributes->merge(['class' => 'table-header-font']) }}>
    {{ $value ?? $slot }}
</label>
