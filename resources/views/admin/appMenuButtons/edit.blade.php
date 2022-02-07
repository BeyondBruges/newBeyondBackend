@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.appMenuButton.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.app-menu-buttons.update", [$appMenuButton->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.appMenuButton.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $appMenuButton->name) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appMenuButton.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="key">{{ trans('cruds.appMenuButton.fields.key') }}</label>
                <input class="form-control {{ $errors->has('key') ? 'is-invalid' : '' }}" type="text" name="key" id="key" value="{{ old('key', $appMenuButton->key) }}">
                @if($errors->has('key'))
                    <span class="text-danger">{{ $errors->first('key') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appMenuButton.fields.key_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.appMenuButton.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $appMenuButton->status) }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appMenuButton.fields.status_helper') }}</span>
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