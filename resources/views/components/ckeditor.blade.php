@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'placeholder' => null,
    'rows' => 5,
    'required' => false,
    'inline' => false,
])

<div class="mb-3">
  <label @class(['form-label', 'required' => $required]) for="{{ $id }}">{{ $label }}</label>
  <textarea {{ $attributes->merge(['class' => $inline ? 'js-ckeditor' : 'js-ckeditor-inline']) }}
            id="{{ $id }}" @if($name) name="{{ $name }}" @endif
            rows="{{ $rows }}" placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>
</div>