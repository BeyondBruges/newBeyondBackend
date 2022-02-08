@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.bLandMark.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.b-land-marks.update", [$bLandMark->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.bLandMark.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $bLandMark->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bLandMark.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="address">{{ trans('cruds.bLandMark.fields.address') }}</label>
                            <textarea class="form-control" name="address" id="address" required>{{ old('address', $bLandMark->address) }}</textarea>
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bLandMark.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="lat">{{ trans('cruds.bLandMark.fields.lat') }}</label>
                            <input class="form-control" type="number" name="lat" id="lat" value="{{ old('lat', $bLandMark->lat) }}" step="0.00000001" required>
                            @if($errors->has('lat'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lat') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bLandMark.fields.lat_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="lng">{{ trans('cruds.bLandMark.fields.lng') }}</label>
                            <input class="form-control" type="number" name="lng" id="lng" value="{{ old('lng', $bLandMark->lng) }}" step="0.00000001" required>
                            @if($errors->has('lng'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lng') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bLandMark.fields.lng_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="image">{{ trans('cruds.bLandMark.fields.image') }}</label>
                            <div class="needsclick dropzone" id="image-dropzone">
                            </div>
                            @if($errors->has('image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bLandMark.fields.image_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="key">{{ trans('cruds.bLandMark.fields.key') }}</label>
                            <input class="form-control" type="text" name="key" id="key" value="{{ old('key', $bLandMark->key) }}" required>
                            @if($errors->has('key'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('key') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bLandMark.fields.key_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('frontend.b-land-marks.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($bLandMark) && $bLandMark->image)
      var file = {!! json_encode($bLandMark->image) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection