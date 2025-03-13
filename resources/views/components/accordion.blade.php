<div {{ $attributes->merge(['class' => implode(' ', $classes)]) }} id="{{ $id }}">
    @foreach($items as $index => $item)
    <div class="accordion-item">
        <button class="{{ $activeIndex === $index ? 'accordion-header' : 'accordion-header collapsed'}}" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#{{ $id }}-body-{{ $index }}"
                aria-expanded="{{ $activeIndex === $index ? 'true' : 'false' }}">
            <div class="accordion-header-text">
                <h4>{{ $item['title'] }}</h4>
            </div>
            <div
                class="{{ $iconPlus ? 'accordion-header-toggle accordion-header-toggle-plus' : 'accordion-header-toggle' }}">
                @if($iconPlus)
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="icon icon-1">
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                </svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="icon icon-1">
                    <path d="M6 9l6 6l6 -6"></path>
                </svg>
                @endif
            </div>
        </button>
        <div id="{{ $id }}-body-{{ $index }}"
             class="{{ $activeIndex === $index ? 'accordion-collapse collapse show' : 'accordion-collapse collapse' }}"
             data-bs-parent="#{{ $id }}">
            <div class="accordion-body">
                {{ $item['body'] }}
            </div>
        </div>
    </div>
    @endforeach
</div>