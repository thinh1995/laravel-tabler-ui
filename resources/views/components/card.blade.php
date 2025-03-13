@props([
'title' => null,
'subtitle' => null,
'actions' => collect(),
'slot' => null,
'footer' => null,
])

<div {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
  @if(!is_null($title) || $actions->isNotEmpty())
    <div class="{{ implode(' ', $headerClasses) }}">
      <div>
        @if(!is_null($title))
          <h3 class="card-title">{{ $title }}</h3>
        @endif
        @if(!is_null($subtitle))
          <p class="card-subtitle">{{ $subtitle }}</p>
        @endif
      </div>
      @if($actions->isNotEmpty())
        <div class="card-actions">{{ $actions }}</div>
      @endif
    </div>
  @endif
  <div class="card-body">{{ $slot }}</div>
  @if(!is_null($footer))
    <div class="{{ implode(' ', $footerClasses) }}">
      {{ $footer }}
    </div>
  @endif
</div>


