@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.company.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.companies.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.company.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.company.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.company.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lat">{{ trans('cruds.company.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat" id="lat" value="{{ old('lat', '') }}">
                @if($errors->has('lat'))
                    <span class="text-danger">{{ $errors->first('lat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lng">{{ trans('cruds.company.fields.lng') }}</label>
                <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="text" name="lng" id="lng" value="{{ old('lng', '') }}">
                @if($errors->has('lng'))
                    <span class="text-danger">{{ $errors->first('lng') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.lng_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo_white">{{ trans('cruds.company.fields.logo_white') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo_white') ? 'is-invalid' : '' }}" id="logo_white-dropzone">
                </div>
                @if($errors->has('logo_white'))
                    <span class="text-danger">{{ $errors->first('logo_white') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.logo_white_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo_color">{{ trans('cruds.company.fields.logo_color') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo_color') ? 'is-invalid' : '' }}" id="logo_color-dropzone">
                </div>
                @if($errors->has('logo_color'))
                    <span class="text-danger">{{ $errors->first('logo_color') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.logo_color_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="favicon">{{ trans('cruds.company.fields.favicon') }}</label>
                <div class="needsclick dropzone {{ $errors->has('favicon') ? 'is-invalid' : '' }}" id="favicon-dropzone">
                </div>
                @if($errors->has('favicon'))
                    <span class="text-danger">{{ $errors->first('favicon') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.favicon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.company.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="google_analyitics">{{ trans('cruds.company.fields.google_analyitics') }}</label>
                <input class="form-control {{ $errors->has('google_analyitics') ? 'is-invalid' : '' }}" type="text" name="google_analyitics" id="google_analyitics" value="{{ old('google_analyitics', '') }}">
                @if($errors->has('google_analyitics'))
                    <span class="text-danger">{{ $errors->first('google_analyitics') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.google_analyitics_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sendinblue_user">{{ trans('cruds.company.fields.sendinblue_user') }}</label>
                <input class="form-control {{ $errors->has('sendinblue_user') ? 'is-invalid' : '' }}" type="text" name="sendinblue_user" id="sendinblue_user" value="{{ old('sendinblue_user', '') }}">
                @if($errors->has('sendinblue_user'))
                    <span class="text-danger">{{ $errors->first('sendinblue_user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.sendinblue_user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sendinblue_password">{{ trans('cruds.company.fields.sendinblue_password') }}</label>
                <input class="form-control {{ $errors->has('sendinblue_password') ? 'is-invalid' : '' }}" type="text" name="sendinblue_password" id="sendinblue_password" value="{{ old('sendinblue_password', '') }}">
                @if($errors->has('sendinblue_password'))
                    <span class="text-danger">{{ $errors->first('sendinblue_password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.sendinblue_password_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="onesignal_appid">{{ trans('cruds.company.fields.onesignal_appid') }}</label>
                <input class="form-control {{ $errors->has('onesignal_appid') ? 'is-invalid' : '' }}" type="text" name="onesignal_appid" id="onesignal_appid" value="{{ old('onesignal_appid', '') }}">
                @if($errors->has('onesignal_appid'))
                    <span class="text-danger">{{ $errors->first('onesignal_appid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.onesignal_appid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="onesignal_apikey">{{ trans('cruds.company.fields.onesignal_apikey') }}</label>
                <input class="form-control {{ $errors->has('onesignal_apikey') ? 'is-invalid' : '' }}" type="text" name="onesignal_apikey" id="onesignal_apikey" value="{{ old('onesignal_apikey', '') }}">
                @if($errors->has('onesignal_apikey'))
                    <span class="text-danger">{{ $errors->first('onesignal_apikey') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.onesignal_apikey_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.logoWhiteDropzone = {
    url: '{{ route('admin.companies.storeMedia') }}',
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
      $('form').find('input[name="logo_white"]').remove()
      $('form').append('<input type="hidden" name="logo_white" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo_white"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($company) && $company->logo_white)
      var file = {!! json_encode($company->logo_white) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo_white" value="' + file.file_name + '">')
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
    Dropzone.options.logoColorDropzone = {
    url: '{{ route('admin.companies.storeMedia') }}',
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
      $('form').find('input[name="logo_color"]').remove()
      $('form').append('<input type="hidden" name="logo_color" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo_color"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($company) && $company->logo_color)
      var file = {!! json_encode($company->logo_color) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo_color" value="' + file.file_name + '">')
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
    Dropzone.options.faviconDropzone = {
    url: '{{ route('admin.companies.storeMedia') }}',
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
      $('form').find('input[name="favicon"]').remove()
      $('form').append('<input type="hidden" name="favicon" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="favicon"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($company) && $company->favicon)
      var file = {!! json_encode($company->favicon) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="favicon" value="' + file.file_name + '">')
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.companies.storeMedia') }}',
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
@if(isset($company) && $company->logo)
      var file = {!! json_encode($company->logo) !!}
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
@endsection