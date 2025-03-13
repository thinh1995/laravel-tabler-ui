@props(['icon' => null, 'action' => null])

<div {{ $attributes->merge(['class' => implode(' ', $classes)]) }} role="alert">
    @if($icon)
    <div class="alert-icon">
    {{ $icon }}
    </div>
    @endif

    <div>
        @if($title)
        <h4 class="alert-heading">{{ $title }}</h4>
        @endif

        @if($description)
        <div class="alert-description">
            @if(is_array($description))
            <ul class="alert-list">
                @foreach($description as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
            @else
            <div class="alert-description">{{ $description }}</div>
            @endif
        </div>
        @endif
    </div>

    @if($action)
    {{ $action }}
    @endif

    @if($dismissible)
    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    @endif
</div>
