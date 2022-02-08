@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.contactText.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contact-texts.update", [$contactText->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="contact_title">{{ trans('cruds.contactText.fields.contact_title') }}</label>
                <input class="form-control {{ $errors->has('contact_title') ? 'is-invalid' : '' }}" type="text" name="contact_title" id="contact_title" value="{{ old('contact_title', $contactText->contact_title) }}">
                @if($errors->has('contact_title'))
                    <span class="text-danger">{{ $errors->first('contact_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contactText.fields.contact_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_subtitle">{{ trans('cruds.contactText.fields.contact_subtitle') }}</label>
                <input class="form-control {{ $errors->has('contact_subtitle') ? 'is-invalid' : '' }}" type="text" name="contact_subtitle" id="contact_subtitle" value="{{ old('contact_subtitle', $contactText->contact_subtitle) }}">
                @if($errors->has('contact_subtitle'))
                    <span class="text-danger">{{ $errors->first('contact_subtitle') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contactText.fields.contact_subtitle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="language_id">{{ trans('cruds.contactText.fields.language') }}</label>
                <select class="form-control select2 {{ $errors->has('language') ? 'is-invalid' : '' }}" name="language_id" id="language_id">
                    @foreach($languages as $id => $entry)
                        <option value="{{ $id }}" {{ (old('language_id') ? old('language_id') : $contactText->language->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('language'))
                    <span class="text-danger">{{ $errors->first('language') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contactText.fields.language_helper') }}</span>
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