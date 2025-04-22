@props([
    'required' => false,
    'name' => null,
    'value' => null,
    'label' => null,
    'hint' => null,
    'maxlength' => null,
    'help' => null,
    'flatExtra' => false,
    'extraLeft' => null,
    'extraRight' => null,
])

@php
  $hasExtra = !is_null($extraLeft) || !is_null($extraRight);
@endphp

<div class="mb-3">
  @error($name)
  @php
    $classes[] = 'is-invalid';
    $invalid = true;
  @endphp
  @enderror

  @if (!is_null($label) && !$isFloat())
    <label @class(['form-label', 'required' => $required]) for="{{ $id }}">
      {{ $label }}
      @if (!is_null($maxlength))
        <span id="{{ $id }}_maxlength"
              class="form-label-description">({{ mb_strlen($value, 'UTF-8') }}/{{ $maxlength }})</span>
      @endif
    </label>
  @endif
  <div class="row g-2">
    <div class="col">
      <div @class([
                'input-group' => $hasExtra,
                'input-group-flat' => $flatExtra,
                'form-floating' => $isFloat(),
            ])>
        @if (!is_null($extraLeft))
          {{ $extraLeft }}
        @endif
        <input {{ $attributes->merge(['class' => implode(' ', $classes), 'type' => 'text']) }}
               id="{{ $id }}" @if($name) name="{{ $name }}" @endif
               value="{{ $name ? old($name, $value) : $value }}"
               @if (!is_null($maxlength)) maxlength="{{ $maxlength }}"
               onblur="{document.getElementById('{{ $id }}_maxlength').innerHTML='(' + document.getElementById('{{ $id }}').value.length + '/{{ $maxlength }})'}" @endif>
        @if (!is_null($label) && $isFloat())
          <label for="{{ $id }}">
            {{ $label }}{!! $required ? '<span class="text-danger">*</span>' : '' !!}
          </label>
          @if (!is_null($maxlength))
            <span id="{{ $id }}_maxlength"
                  class="form-label-description position-absolute top-0 end-0 p-2">({{ mb_strlen($value, 'UTF-8') }}/{{ $maxlength }})</span>
          @endif
        @endif

        @if (!is_null($extraRight))
          {{ $extraRight }}
        @endif
      </div>
      @if (!in_array('is-invalid', $classes))
        <small class="form-hint mt-1">{{ $hint }}</small>
      @endif

      @error($name)
      <div class="invalid-feedback d-block">{{ $message }}</div>
      @enderror
    </div>
    @if (!is_null($help))
      <div class="col-auto align-self-start">
                <span class="form-help" data-bs-toggle="popover" data-bs-placement="top"
                      data-bs-content="{{ $help }}" data-bs-html="true">?</span>
      </div>
    @endif
  </div>
</div>
