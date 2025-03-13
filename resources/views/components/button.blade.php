@props(['slot' => null])

@if($anchor)
  <a {{ $attributes->merge(['class' => implode(' ', $classes)]) }} id="{{ $id }}">{{ $slot }}</a>
@else
  <button {{ $attributes->merge(['class' => implode(' ', $classes), 'type' => 'button']) }} id="{{ $id }}">{{ $slot }}</button>
@endif