@props([
    'name',
    'label' => null,
    'value' => '',
    'placeholder' => null,
    'class' => 'form-control mb-2',
    'accept' => null,
    'multiple' => false,
    'showPreview' => false,
    'previewClass' => 'mt-2',
    'help' => null,
])

<div class="form-group">
    <label for="{{ $name }}">{{ $label ?? ucfirst(str_replace('_', ' ', $name)) }}</label>

    @if($showPreview && $value)
        <div class="{{ $previewClass }}">
            @if(is_array($value))
                @foreach($value as $file)
                    <div class="d-inline-block me-2">
                        <img src="{{ asset($file) }}" alt="Preview" style="max-width: 100px; max-height: 100px; object-fit: cover;" class="rounded border">
                    </div>
                @endforeach
            @else
                <img src="{{ asset($value) }}" alt="Preview" style="max-width: 150px; max-height: 150px; object-fit: cover;" class="rounded border">
            @endif
        </div>
    @endif

    <input
        id="{{ $name }}"
        name="{{ $multiple ? $name . '[]' : $name }}"
        type="file"
        class="{{ $class }} @error($name) is-invalid @enderror"
        @if($accept) accept="{{ $accept }}" @endif
        @if($multiple) multiple @endif
        placeholder="{{ $placeholder ?? 'Выберите файл' }}"
        {{ $attributes }}
    >

    @if($help)
        <small class="form-text text-muted">{{ $help }}</small>
    @endif

    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
    @error($name . '.*')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
