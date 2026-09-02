@props([
    'name',
    'label' => null,
    'value' => '',
    'placeholder' => null,
    'rows' => 4,
    'type' => '',
    'class' => 'form-control mb-2',
    'id' => null,
])

@php
    $id = $id ?? $name;
    $labelText = $label ?? ucfirst(str_replace('_', ' ', $name));
    $placeholderText = $placeholder ?? 'Введите ' . $labelText;
@endphp

<div class="form-group">
    <label for="{{ $id }}" class="form-label">{{ $labelText }}</label>
    <textarea
        id="{{ $id }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        type="{{ $type }}"
        class="{{ $class }} @error($name) is-invalid @enderror"
        placeholder="{{ $placeholderText }}"
        {{ $attributes }}
    >{{ old($name, $value) }}</textarea>
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
