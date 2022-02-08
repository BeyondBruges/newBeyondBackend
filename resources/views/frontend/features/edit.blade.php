@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.feature.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.features.update", [$feature->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="icon_code">{{ trans('cruds.feature.fields.icon_code') }}</label>
                            <input class="form-control" type="text" name="icon_code" id="icon_code" value="{{ old('icon_code', $feature->icon_code) }}">
                            @if($errors->has('icon_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('icon_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.feature.fields.icon_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.feature.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $feature->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.feature.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.feature.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $feature->description) }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.feature.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="language_id">{{ trans('cruds.feature.fields.language') }}</label>
                            <select class="form-control select2" name="language_id" id="language_id" required>
                                @foreach($languages as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('language_id') ? old('language_id') : $feature->language->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('language'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('language') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.feature.fields.language_helper') }}</span>
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