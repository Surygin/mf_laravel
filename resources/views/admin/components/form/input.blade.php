@props([
    'name',
    'label' => null,
    'type' => 'text',
    'value' => '',
    'placeholder' => null,
    'class' => 'form-control mb-2',
])

<div class="form-group">
    <label for="{{ $name }}">{{ $label ?? ucfirst(str_replace('_', ' ', $name)) }}</label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        class="{{ $class }} @error($name) is-invalid @enderror"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder ?? 'Введите ' . ($label ?? str_replace('_', ' ', $name)) }}"
        {{ $attributes }}
    >
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
