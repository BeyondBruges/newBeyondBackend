@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.question.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="level_id">{{ trans('cruds.question.fields.level') }}</label>
                <select class="form-control select2 {{ $errors->has('level') ? 'is-invalid' : '' }}" name="level_id" id="level_id" required>
                    @foreach($levels as $id => $entry)
                        <option value="{{ $id }}" {{ old('level_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('level'))
                    <span class="text-danger">{{ $errors->first('level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.level_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.question.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="content">{{ trans('cruds.question.fields.content') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{!! old('content') !!}</textarea>
                @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.content_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="option_a">{{ trans('cruds.question.fields.option_a') }}</label>
                <textarea class="form-control {{ $errors->has('option_a') ? 'is-invalid' : '' }}" name="option_a" id="option_a">{{ old('option_a') }}</textarea>
                @if($errors->has('option_a'))
                    <span class="text-danger">{{ $errors->first('option_a') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.option_a_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="option_b">{{ trans('cruds.question.fields.option_b') }}</label>
                <input class="form-control {{ $errors->has('option_b') ? 'is-invalid' : '' }}" type="text" name="option_b" id="option_b" value="{{ old('option_b', '') }}">
                @if($errors->has('option_b'))
                    <span class="text-danger">{{ $errors->first('option_b') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.option_b_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="option_c">{{ trans('cruds.question.fields.option_c') }}</label>
                <input class="form-control {{ $errors->has('option_c') ? 'is-invalid' : '' }}" type="text" name="option_c" id="option_c" value="{{ old('option_c', '') }}">
                @if($errors->has('option_c'))
                    <span class="text-danger">{{ $errors->first('option_c') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.option_c_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="correct">{{ trans('cruds.question.fields.correct') }}</label>
                <input class="form-control {{ $errors->has('correct') ? 'is-invalid' : '' }}" type="text" name="correct" id="correct" value="{{ old('correct', '') }}">
                @if($errors->has('correct'))
                    <span class="text-danger">{{ $errors->first('correct') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.correct_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.questions.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $question->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection