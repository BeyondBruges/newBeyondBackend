@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.notification.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.push-notifications.update", [$notification->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="key">key</label>
                <input class="form-control {{ $errors->has('key') ? 'is-invalid' : '' }}" type="text" name="key" id="key" value="{{ old('key', $notification->key) }}" required>
                @if($errors->has('key'))
                    <span class="text-danger">{{ $errors->first('key') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="en_title">en_title</label>
                <input class="form-control {{ $errors->has('en_title') ? 'is-invalid' : '' }}" type="text" name="en_title" id="en_title" value="{{ old('en_title', $notification->en_title) }}" required>
                @if($errors->has('en_title'))
                    <span class="text-danger">{{ $errors->first('en_title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="es_title">es_title</label>
                <input class="form-control {{ $errors->has('es_title') ? 'is-invalid' : '' }}" type="text" name="es_title" id="es_title" value="{{ old('es_title', $notification->es_title) }}" required>
                @if($errors->has('es_title'))
                    <span class="text-danger">{{ $errors->first('es_title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="nl_title">nl_title</label>
                <input class="form-control {{ $errors->has('nl_title') ? 'is-invalid' : '' }}" type="text" name="nl_title" id="nl_title" value="{{ old('nl_title', $notification->nl_title) }}" required>
                @if($errors->has('nl_title'))
                    <span class="text-danger">{{ $errors->first('nl_title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="fr_title">fr_title</label>
                <input class="form-control {{ $errors->has('fr_title') ? 'is-invalid' : '' }}" type="text" name="fr_title" id="fr_title" value="{{ old('fr_title', $notification->fr_title) }}" required>
                @if($errors->has('fr_title'))
                    <span class="text-danger">{{ $errors->first('fr_title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="en_content">en_content</label>
                <input class="form-control {{ $errors->has('en_content') ? 'is-invalid' : '' }}" type="text" name="en_content" id="en_content" value="{{ old('en_content', $notification->en_content) }}" required>
                @if($errors->has('en_content'))
                    <span class="text-danger">{{ $errors->first('en_content') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="es_content">es_content</label>
                <input class="form-control {{ $errors->has('es_content') ? 'is-invalid' : '' }}" type="text" name="es_content" id="es_content" value="{{ old('es_content', $notification->es_content) }}" required>
                @if($errors->has('es_content'))
                    <span class="text-danger">{{ $errors->first('es_content') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="nl_content">nl_content</label>
                <input class="form-control {{ $errors->has('nl_content') ? 'is-invalid' : '' }}" type="text" name="nl_content" id="nl_content" value="{{ old('nl_content', $notification->nl_content) }}" required>
                @if($errors->has('nl_content'))
                    <span class="text-danger">{{ $errors->first('nl_content') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="fr_content">fr_content</label>
                <input class="form-control {{ $errors->has('fr_content') ? 'is-invalid' : '' }}" type="text" name="fr_content" id="fr_content" value="{{ old('fr_content', $notification->fr_content) }}" required>
                @if($errors->has('fr_content'))
                    <span class="text-danger">{{ $errors->first('fr_content') }}</span>
                @endif
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
