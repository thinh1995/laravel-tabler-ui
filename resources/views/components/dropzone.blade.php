@props([
    'name' => null,
    'maxFileSize' => 2,
    'acceptedFiles' => null,
])
<div>
  <div class="dropzone" id="remove_link_{{ $key }}">
    <div class="fallback">
      <input @if($name) name="{{ $name . '_' . $key }}" @endif type="file" @if($multiple) multiple @endif/>
    </div>
  </div>
  <input type="file" @if($name) name="{{ $name }}" @endif class="d-none" @if($multiple) multiple @endif/>

  @if($multiple)
    @foreach($files as $index => $file)
      <input type="hidden" name="uploaded_{{ $name }}[{{ $index }}]" value="{{ $file->uuid }}"/>
    @endforeach
  @else
    <input type="hidden" name="uploaded_{{ $name }}" value="{{ $files[0]->uuid }}"/>
  @endif
</div>

@push('script')
  <script>
    window['{{ $name }}'] = {
      maxFiles: {{ is_null($maxFiles) ? 'null' : $maxFiles }},
      multiple: !!({{ (int)$multiple }}),
      inputName: '{{ $name }}',
      uploadedFiles: @json($files),
      uploadedInputName: '{{ 'uploaded_' . $name }}',
      maxFileSize: {{ $maxFileSize }},
      acceptedFiles: '{{ $acceptedFiles }}'
    };

    Dropzone.autoDiscover = false;
    $("#remove_link_{{ $key }}").dropzone({
      url: "#",
      maxFiles: window['{{ $name }}'].maxFiles,
      maxFilesize: window['{{ $name }}'].maxFileSize,
      acceptedFiles: window['{{ $name }}'].acceptedFiles,
      autoProcessQueue: false,
      addRemoveLinks: true,
      init: function () {
        let mockFile = [];
        let self = this;

        if (window['{{ $name }}'].uploadedFiles.length) {
          window['{{ $name }}'].uploadedFiles.forEach(function (element) {
            let tmpFile = {
              name: element.name,
              size: element.size,
              uuid: element.uuid,
              uploaded: true,
              accepted: true
            };
            mockFile.push(tmpFile)
            self.files.push(tmpFile);
            self.displayExistingFile(tmpFile, element.original_url, null, "anonymous");
          });
        }

        function addFileToInput(files, name) {
          let fileList = new DataTransfer();
          files.forEach((file) => {
            if (file.upload !== undefined) {
              fileList.items.add(file);
            }
          });
          document.querySelectorAll(`input[name="${name}"]`)[0].files = fileList.files;
        }

        this.on('addedfile', function (file) {
          setTimeout(() => {
            if (file.accepted) {
              if (!window['{{ $name }}'].multiple && mockFile.length) {
                this.removeFile(mockFile[0]);
                $(`input[name^="${window['{{ $name }}'].uploadedInputName}"]`).remove();
              }
              $('.dz-progress').hide();
              addFileToInput(this.files, window['{{ $name }}'].inputName);
            }
          });
        });

        this.on("removedfile", function (file) {
          let uploadedFile = $(`input[name^="${window['{{ $name }}'].uploadedInputName}"][value=${file.uuid}]`)
          if (uploadedFile.length) {
            uploadedFile.remove();
          }
        });

        this.on("maxfilesexceeded", function (file) {
          if (!window['{{ $name }}'].multiple) {
            this.removeAllFiles();
            this.addFile(file);
            addFileToInput(this.files, window['{{ $name }}'].inputName);
          }
        });
      },
    });
  </script>
@endpush