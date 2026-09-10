@props([
    'name',
    'label' => null,
    'value' => '',
    'placeholder' => null,
    'class' => 'form-control mb-2',
    'min' => null,
    'max' => null,
    'step' => null,
])

<div class="form-group">
    <label for="{{ $name }}">{{ $label ?? ucfirst(str_replace('_', ' ', $name)) }}</label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="date"
        class="{{ $class }} @error($name) is-invalid @enderror"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder ?? 'Выберите дату' }}"
        @if($min) min="{{ $min }}" @endif
        @if($max) max="{{ $max }}" @endif
        @if($step) step="{{ $step }}" @endif
        {{ $attributes }}
    >
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
