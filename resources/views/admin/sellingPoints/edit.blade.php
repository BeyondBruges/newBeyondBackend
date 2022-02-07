@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sellingPoint.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.selling-points.update", [$sellingPoint->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="icon_code">{{ trans('cruds.sellingPoint.fields.icon_code') }}</label>
                <input class="form-control {{ $errors->has('icon_code') ? 'is-invalid' : '' }}" type="text" name="icon_code" id="icon_code" value="{{ old('icon_code', $sellingPoint->icon_code) }}">
                @if($errors->has('icon_code'))
                    <span class="text-danger">{{ $errors->first('icon_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sellingPoint.fields.icon_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.sellingPoint.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $sellingPoint->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sellingPoint.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.sellingPoint.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $sellingPoint->description) }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sellingPoint.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="language_id">{{ trans('cruds.sellingPoint.fields.language') }}</label>
                <select class="form-control select2 {{ $errors->has('language') ? 'is-invalid' : '' }}" name="language_id" id="language_id">
                    @foreach($languages as $id => $entry)
                        <option value="{{ $id }}" {{ (old('language_id') ? old('language_id') : $sellingPoint->language->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('language'))
                    <span class="text-danger">{{ $errors->first('language') }}</span>
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



@endsection