@props([
	'name' => null,
	'value' => null,
	'label' => null,
	'description' => null,
	'inline' => false
])

<label class="form-check @if($inline) form-check-inline @endif">
  <input type="checkbox" {{ $attributes->merge(['class' => 'form-check-input']) }} id="{{ $id }}"
         @if($name) name="{{ $name }}" @endif value="{{ $value }}" @checked(old(str_replace('[]', '', $name), false))>
  @if(!is_null($label))
    <span class="form-check-label">{{ $label }}</span>
  @endif
  @if(!is_null($description))
    <span class="form-check-description">{{ $description }}</span>
  @endif
</label>