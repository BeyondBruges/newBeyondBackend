@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.hotspot.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.hotspots.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.hotspot.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hotspot.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_id">{{ trans('cruds.hotspot.fields.level') }}</label>
                <select class="form-control select2 {{ $errors->has('level') ? 'is-invalid' : '' }}" name="level_id" id="level_id" required>
                    @foreach($levels as $id => $entry)
                        <option value="{{ $id }}" {{ old('level_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('level'))
                    <span class="text-danger">{{ $errors->first('level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hotspot.fields.level_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="key">{{ trans('cruds.hotspot.fields.key') }}</label>
                <input class="form-control {{ $errors->has('key') ? 'is-invalid' : '' }}" type="text" name="key" id="key" value="{{ old('key', '') }}">
                @if($errors->has('key'))
                    <span class="text-danger">{{ $errors->first('key') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hotspot.fields.key_helper') }}</span>
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