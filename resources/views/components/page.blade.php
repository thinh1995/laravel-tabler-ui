@props([
    'title' => null,
    'actions' => null,
    'breadcrumbs' => null,
    'footer' => null,
])

<div class="page-wrapper">
  @if(!is_null($title) || !is_null($actions) || !is_null($breadcrumbs))
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          @if(!is_null($title))
            <div class="col">
              <h2 class="page-title">{{ $title }}</h2>
            </div>
          @endif
          @if(!is_null($actions) || !is_null($breadcrumbs))
            <div class="col-auto ms-auto d-print-none">
              <div class="d-flex">
                @if(!is_null($actions))
                  {{ $actions }}
                @endif
                @if(!is_null($breadcrumbs))
                  {{ $breadcrumbs }}
                @endif
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  @endif
  <div class="page-body">
    <div class="container-xl">
      {{ $slot }}
    </div>
  </div>

  @if(!is_null($footer))
    <footer class="footer footer-transparent d-print-none">
      <div class="container-xl">
        {{ $footer }}
      </div>
    </footer>
  @endif
</div>