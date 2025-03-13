@props([
    'name' => null,
    'type' => 'outline',
    'class' => '',
])

@if(!empty($name))
  @php
    $file = "$dir/$type/$name.svg";
    $svg = file_exists(public_path($file)) ? public_path($file) : null;
  @endphp

  @if(!is_null($svg))
    {!! str_replace('<svg', '<svg class="icon ' . $class . '"', file_get_contents($svg)) !!}
  @endif
@endif
