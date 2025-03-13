@props(['slot' => null])

<span {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>{{ $dot ? '' : $slot }}</span>