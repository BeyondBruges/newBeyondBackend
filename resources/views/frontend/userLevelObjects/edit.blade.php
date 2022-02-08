@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.userLevelObject.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.user-level-objects.update", [$userLevelObject->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.userLevelObject.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $userLevelObject->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userLevelObject.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="level_object_id">{{ trans('cruds.userLevelObject.fields.level_object') }}</label>
                            <select class="form-control select2" name="level_object_id" id="level_object_id" required>
                                @foreach($level_objects as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('level_object_id') ? old('level_object_id') : $userLevelObject->level_object->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('level_object'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('level_object') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection