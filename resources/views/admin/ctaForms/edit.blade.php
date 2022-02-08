@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.ctaForm.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cta-forms.update", [$ctaForm->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.ctaForm.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $ctaForm->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ctaForm.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subtitle">{{ trans('cruds.ctaForm.fields.subtitle') }}</label>
                <input class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $ctaForm->subtitle) }}">
                @if($errors->has('subtitle'))
                    <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ctaForm.fields.subtitle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="inputfield_text">{{ trans('cruds.ctaForm.fields.inputfield_text') }}</label>
                <input class="form-control {{ $errors->has('inputfield_text') ? 'is-invalid' : '' }}" type="text" name="inputfield_text" id="inputfield_text" value="{{ old('inputfield_text', $ctaForm->inputfield_text) }}">
                @if($errors->has('inputfield_text'))
                    <span class="text-danger">{{ $errors->first('inputfield_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ctaForm.fields.inputfield_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_text">{{ trans('cruds.ctaForm.fields.button_text') }}</label>
                <input class="form-control {{ $errors->has('button_text') ? 'is-invalid' : '' }}" type="text" name="button_text" id="button_text" value="{{ old('button_text', $ctaForm->button_text) }}">
                @if($errors->has('button_text'))
                    <span class="text-danger">{{ $errors->first('button_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ctaForm.fields.button_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="legends_title">{{ trans('cruds.ctaForm.fields.legends_title') }}</label>
                <input class="form-control {{ $errors->has('legends_title') ? 'is-invalid' : '' }}" type="text" name="legends_title" id="legends_title" value="{{ old('legends_title', $ctaForm->legends_title) }}">
                @if($errors->has('legends_title'))
                    <span class="text-danger">{{ $errors->first('legends_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ctaForm.fields.legends_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="legends_subtitle">{{ trans('cruds.ctaForm.fields.legends_subtitle') }}</label>
                <input class="form-control {{ $errors->has('legends_subtitle') ? 'is-invalid' : '' }}" type="text" name="legends_subtitle" id="legends_subtitle" value="{{ old('legends_subtitle', $ctaForm->legends_subtitle) }}">
                @if($errors->has('legends_subtitle'))
                    <span class="text-danger">{{ $errors->first('legends_subtitle') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ctaForm.fields.legends_subtitle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="legends_link">{{ trans('cruds.ctaForm.fields.legends_link') }}</label>
                <input class="form-control {{ $errors->has('legends_link') ? 'is-invalid' : '' }}" type="text" name="legends_link" id="legends_link" value="{{ old('legends_link', $ctaForm->legends_link) }}">
                @if($errors->has('legends_link'))
                    <span class="text-danger">{{ $errors->first('legends_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ctaForm.fields.legends_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="legends_button_text">{{ trans('cruds.ctaForm.fields.legends_button_text') }}</label>
                <input class="form-control {{ $errors->has('legends_button_text') ? 'is-invalid' : '' }}" type="text" name="legends_button_text" id="legends_button_text" value="{{ old('legends_button_text', $ctaForm->legends_button_text) }}">
                @if($errors->has('legends_button_text'))
                    <span class="text-danger">{{ $errors->first('legends_button_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ctaForm.fields.legends_button_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="language_id">{{ trans('cruds.ctaForm.fields.language') }}</label>
                <select class="form-control select2 {{ $errors->has('language') ? 'is-invalid' : '' }}" name="language_id" id="language_id" required>
                    @foreach($languages as $id => $entry)
                        <option value="{{ $id }}" {{ (old('language_id') ? old('language_id') : $ctaForm->language->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('language'))
                    <span class="text-danger">{{ $errors->first('language') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ctaForm.fields.language_helper') }}</span>
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