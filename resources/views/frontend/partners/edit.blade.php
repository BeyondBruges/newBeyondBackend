@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.partner.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.partners.update", [$partner->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.partner.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $partner->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="url">{{ trans('cruds.partner.fields.url') }}</label>
                            <input class="form-control" type="text" name="url" id="url" value="{{ old('url', $partner->url) }}">
                            @if($errors->has('url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="logo">{{ trans('cruds.partner.fields.logo') }}</label>
                            <div class="needsclick dropzone" id="logo-dropzone">
                            </div>
                            @if($errors->has('logo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('logo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.logo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="lat">{{ trans('cruds.partner.fields.lat') }}</label>
                            <input class="form-control" type="number" name="lat" id="lat" value="{{ old('lat', $partner->lat) }}" step="0.00000001">
                            @if($errors->has('lat'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lat') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.lat_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="lng">{{ trans('cruds.partner.fields.lng') }}</label>
                            <input class="form-control" type="number" name="lng" id="lng" value="{{ old('lng', $partner->lng) }}" step="0.00000001">
                            @if($errors->has('lng'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lng') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.lng_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="gallery">{{ trans('cruds.partner.fields.gallery') }}</label>
                            <div class="needsclick dropzone" id="gallery-dropzone">
                            </div>
                            @if($errors->has('gallery'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gallery') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.gallery_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="facebook">{{ trans('cruds.partner.fields.facebook') }}</label>
                            <input class="form-control" type="text" name="facebook" id="facebook" value="{{ old('facebook', $partner->facebook) }}">
                            @if($errors->has('facebook'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('facebook') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.facebook_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="instagram">{{ trans('cruds.partner.fields.instagram') }}</label>
                            <input class="form-control" type="text" name="instagram" id="instagram" value="{{ old('instagram', $partner->instagram) }}">
                            @if($errors->has('instagram'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('instagram') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.instagram_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tiktok">{{ trans('cruds.partner.fields.tiktok') }}</label>
                            <input class="form-control" type="text" name="tiktok" id="tiktok" value="{{ old('tiktok', $partner->tiktok) }}">
                            @if($errors->has('tiktok'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tiktok') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.tiktok_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.partner.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $partner->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.email_helper') }}</span>
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('frontend.partners.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($partner) && $partner->logo)
      var file = {!! json_encode($partner->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
<script>
    var uploadedGalleryMap = {}
Dropzone.options.galleryDropzone = {
    url: '{{ route('frontend.partners.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
      uploadedGalleryMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGalleryMap[file.name]
      }
      $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($partner) && $partner->gallery)
          var files =
            {!! json_encode($partner->gallery) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
            }
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