@props([
  'required' => false,
  'name' => null,
  'value' => null,
  'label' => null,
  'hint' => null,
  'options' => [],
  'selected' => null,
  'emptyValue' => false,
  'emptyText' => 'None',
  'multiple' => false,
])
<div @class(['mb-3', 'form-floating' => $isFloat()])>
  @error(str_replace('[]', '.*', $name))
  @php
    $classes[] = 'is-invalid';
    $invalid = true;
  @endphp
  @enderror
  @if(!is_null($label) && !$isFloat())
    <label
      @class(['form-label', 'required' => $required]) for="{{ $id }}">{{ $label }}</label>
  @endif
  <select {{ $attributes->merge(['class' => implode(' ', $classes)]) }} id="{{ $id }}" name="{{ $name }}"
          multiple="{{ $multiple }}">
    @if($emptyValue)
      <option value="">{{ $emptyText }}</option>
    @endif
    @foreach($options as $option)
      @if ($multiple)
        @if(is_array($option) && !empty($option))
          <option
            value="{{ $option['value'] ?? $option[0] }}"
            @selected(in_array(($option['value'] ?? $option[0]), old(str_replace('[]', '', $name), $selected)))>{{ $option['text'] ?? $option[count($option)] }}</option>
        @else
          <option
            value="{{ $option }}"
            @selected(in_array($option, old(str_replace('[]', '', $name), $selected)))>{{ $option }}</option>
        @endif
      @else
        @if(is_array($option) && !empty($option))
          <option
            value="{{ $option['value'] ?? $option[0] }}" @selected(old($name, $selected) == ($option['value'] ?? $option[0]))>{{ $option['text'] ?? $option[count($option)] }}</option>
        @else
          <option
            value="{{ $option }}" @selected(old($name, $selected) == $option)>{{ $option }}</option>
        @endif
      @endif
    @endforeach
    {{ $slot }}
  </select>
  @if(!is_null($label) && $isFloat())
    <label
      @class(['form-floating']) for="{{ $id }}">{{ $label }}{!! $required ? '<span class="text-danger">*</span>' : '' !!}</label>
  @endif
  @if(!in_array('is-invalid', $classes))
    <small class="form-hint mt-1">{{ $hint }}</small>
  @endif

  @error(str_replace('[]', '.*', $name))
  <div class="invalid-feedback d-block">{{ $message }}</div>
  @enderror
</div>