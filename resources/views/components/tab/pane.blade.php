@aware(['id', 'default', 'fade', 'navs'])
@props(['index' => 0])

@if((isset($navs[$index]) && (!is_array($navs[$index])) || empty($navs[$index]['disabled'])))
  <div class="tab-pane {{ $fade ? 'fade' : '' }} {{ $default == $index ? 'active show' : '' }}"
       id="{{ $id }}_{{ $index }}"
       role="tabpanel">{{ $slot }}</div>
@endif