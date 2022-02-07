@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.video.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.videos.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="youtube">{{ trans('cruds.video.fields.youtube') }}</label>
                            <input class="form-control" type="text" name="youtube" id="youtube" value="{{ old('youtube', '') }}" required>
                            @if($errors->has('youtube'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('youtube') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.video.fields.youtube_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="language_id">{{ trans('cruds.video.fields.language') }}</label>
                            <select class="form-control select2" name="language_id" id="language_id">
                                @foreach($languages as $id => $entry)
                                    <option value="{{ $id }}" {{ old('language_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('language'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('language') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.video.fields.language_helper') }}</span>
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