@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.sellingPoint.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.selling-points.update", [$sellingPoint->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="icon_code">{{ trans('cruds.sellingPoint.fields.icon_code') }}</label>
                            <input class="form-control" type="text" name="icon_code" id="icon_code" value="{{ old('icon_code', $sellingPoint->icon_code) }}">
                            @if($errors->has('icon_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('icon_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.sellingPoint.fields.icon_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.sellingPoint.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $sellingPoint->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.sellingPoint.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.sellingPoint.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $sellingPoint->description) }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.sellingPoint.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="language_id">{{ trans('cruds.sellingPoint.fields.language') }}</label>
                            <select class="form-control select2" name="language_id" id="language_id">
                                @foreach($languages as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('language_id') ? old('language_id') : $sellingPoint->language->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('language'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('language') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.sellingPoint.fields.language_helper') }}</span>
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