<div class="card mb-3">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
      @foreach($navs as $index => $nav)
        <li class="{{ (is_array($nav) && isset($nav['class'])) ? 'nav-item ' . $nav['class'] : 'nav-item' }}"
            role="presentation">
          <a href="#{{ $id }}_{{ $index }}"
             class="{{ $default == $index ? 'nav-link active' : 'nav-link' }} {{ (is_array($nav) && !empty($nav['disabled']) ? 'disabled' : '') }}"
             data-bs-toggle="tab"
             aria-selected="{{ $default == $index ? 'true' : 'false' }}"
             role="tab">{{ (is_array($nav) && !empty($nav['icon'])) ? $nav['icon'] : '' }}{{ is_array($nav) ? $nav['title'] : $nav }}</a>
        </li>
      @endforeach
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      {{ $slot }}
    </div>
  </div>
</div>