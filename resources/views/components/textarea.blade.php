@props([
  'required' => false,
  'name' => null,
  'value' => null,
  'label' => null,
  'maxlength' => null,
  'rows' => 5,
  'hint' => null
])

<div class="mb-3">
  @error($name)
  @php
    $classes[] = 'is-invalid';
    $invalid = true;
  @endphp
  @enderror
  <label
    @class(['form-label', 'required' => $required]) for="{{ $id }}">
    {{ $label }}
    @if($maxlength)
      <span id="{{ $id }}_maxlength"
            class="form-label-description">({{ mb_strlen($value, 'UTF-8') }}/{{ $maxlength }})</span>
    @endif
  </label>
  <textarea {{ $attributes->merge(['class' => implode(' ', $classes)]) }} id="{{ $id }}"
            @if($name) name="{{ $name }}" @endif rows="{{ $rows }}"
            @if(!is_null($maxlength))
              maxlength="{{ $maxlength }}"
            onblur="{document.getElementById('{{ $id }}_maxlength').innerHTML='(' + document.getElementById('{{ $id }}').value.length + '/{{ $maxlength }})'}"
            @endif
  >{{ $name ? old($name, $value) : $value }}</textarea>

  @if(!$invalid)
    <small class="form-hint mt-1">{{ $hint }}</small>
  @endif

  @error($name)
  <div class="invalid-feedback d-block">{{ $message }}</div>
  @enderror
</div>