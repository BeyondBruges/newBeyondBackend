@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.userLevelObject.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-level-objects.update", [$userLevelObject->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.userLevelObject.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $userLevelObject->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userLevelObject.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_object_id">{{ trans('cruds.userLevelObject.fields.level_object') }}</label>
                <select class="form-control select2 {{ $errors->has('level_object') ? 'is-invalid' : '' }}" name="level_object_id" id="level_object_id" required>
                    @foreach($level_objects as $id => $entry)
                        <option value="{{ $id }}" {{ (old('level_object_id') ? old('level_object_id') : $userLevelObject->level_object->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('level_object'))
                    <span class="text-danger">{{ $errors->first('level_object') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userLevelObject.fields.level_object_helper') }}</span>
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