@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.featureTitle.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.feature-titles.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.featureTitle.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.featureTitle.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="subtitle">{{ trans('cruds.featureTitle.fields.subtitle') }}</label>
                            <input class="form-control" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', '') }}">
                            @if($errors->has('subtitle'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('subtitle') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.featureTitle.fields.subtitle_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="language_id">{{ trans('cruds.featureTitle.fields.language') }}</label>
                            <select class="form-control select2" name="language_id" id="language_id" required>
                                @foreach($languages as $id => $entry)
                                    <option value="{{ $id }}" {{ old('language_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('language'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('language') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.featureTitle.fields.language_helper') }}</span>
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