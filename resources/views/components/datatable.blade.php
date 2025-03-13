@props([
    'thead' => null,
    'tbody' => null,
    'tfoot' => null,
])

<div id="{{ $id }}" class="table-responsive">
  {{ $slot }}
  <table class="table table-bordered table-hover table-vcenter js-dataTable-buttons">
    @if(!is_null($thead))
      <thead>
      {{ $thead }}
      </thead>
    @endif
    @if(!is_null($tbody))
      <tbody>
      {{ $tbody }}
      </tbody>
    @endif
    @if(!is_null($tfoot))
      <tfoot>
      {{ $tfoot }}
      </tfoot>
    @endif
  </table>
</div>