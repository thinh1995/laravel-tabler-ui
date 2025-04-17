<div class="mb-3">
  <label
    @class(['form-label', 'required' => $isRequired]) for="{{ $id }}">{{ $label }}</label>
  <select placeholder="{{ $placeholder }}" class="form-control form-select" id="{{ $id }}"
          @if($name) name="{{ $name }}" @endif @if($multiple) multiple @endif autocomplete="off">
    @if($hasEmptyValue)
      <option value=""></option>
    @endif
    @foreach($options as $option)
      <option value="{{ $option[$valueField] }}"
              @selected(old($name, $selected) == $option[$valueField])
              data-src="{{ \Illuminate\Support\Arr::get($option, $imageField) }}">{{ $option[$textField] }}</option>
    @endforeach
  </select>
</div>

@pushOnce('script')
  <script src="{{ assetVersion('backend/dist/libs/tom-select/dist/js/tom-select.complete.min.js') }}"></script>
  <style>
      .ts-dropdown.single {
          z-index: 9999;
      }
  </style>
@endPushOnce

@push('script')
  <script>
    $(document).ready(function () {
      let selected_{{ $id }} = @json($selected) ??
      [];
      let option_{{ $id }} = [];
      if (selected_{{ $id }}.length) {
        option_{{ $id }} = selected_{{ $id }}.map(function (item) {
          return {name: item};
        });
      }

      new TomSelect("#{{ $id }}", {
        items: selected_{{ $id }},
        persist: false,
        preload: true,
        create: {{ (int)$create }},
        @if($hasEmptyValue)
        allowEmptyOption: true,
        @endif
          @if(!is_null($remoteUrl))
        options: option_{{ $id }},
        valueField: 'name',
        labelField: 'name',
        searchField: 'name',
        load: function (query, callback) {
          let self = this;
          if (self.loading > 1) {
            callback();
            return;
          }

          let url = '{{ $remoteUrl }}';
          fetch(url)
            .then(response => response.json())
            .then(json => {
              callback(json.data);
              self.settings.load = null;
            }).catch(() => {
            callback();
          });
        },
        @endif
          @if($hasImage)
        onItemAdd: {{ $onItemAdd }},
        render: {
          option: function (data, escape) {
            if (data.value === '') {
              return `<div>${data.text}</div>`
            }
            return `<div><img class="avatar me-3" src="${data.src}" alt="${data.text}">${data.text}</div>`;
          },
          item: function (item, escape) {
            if (item.value === '') {
              return `<div>${item.text}</div>`
            }
            return `<div><img class="avatar me-3" src="${item.src}" alt="${item.text}">${item.text}</div>`;
          },
          dropdown: function () {
            return '<div></div>';
          }
        }
        @endif
      });
    });
  </script>
@endpush