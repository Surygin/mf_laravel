@props([
    'name',
    'label' => null,
    'checked' => false,
    'id' => null,
])

@php
    $id = $id ?? $name;
    $labelText = $label ?? ucfirst(str_replace('_', ' ', $name));
@endphp

<div class="form-check mb-3">
    <input
        type="checkbox"
        name="{{ $name }}"
        id="{{ $id }}"
        class="form-check-input @error($name) is-invalid @enderror"
        value="1"
        {{ old($name, $checked) ? 'checked' : '' }}
        {{ $attributes }}
    >
    <label class="form-check-label" for="{{ $id }}">
        {{ $labelText }}
    </label>
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
