@props([
	'name' => null,
	'value' => null,
	'label' => null,
	'description' => null,
	'inline' => false,
  'checked' => false,
])

<label class="form-check form-switch @if($inline) form-check-inline @endif">
  <input name="{{ $name }}" type="hidden" value="0">
  <input {{ $attributes->merge(['class' => 'form-check-input']) }} type="checkbox" id="{{ $id }}" name="{{ $name }}"
         value="{{ $value }}" @checked($checked)>
  @if(!is_null($label))
    <span class="form-check-label">{{ $label }}</span>
  @endif
  @if(!is_null($description))
    <span class="form-check-description">{{ $description }}</span>
  @endif
</label>