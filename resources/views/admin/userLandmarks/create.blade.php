@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.userLandmark.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-landmarks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.userLandmark.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userLandmark.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="landmark_id">{{ trans('cruds.userLandmark.fields.landmark') }}</label>
                <select class="form-control select2 {{ $errors->has('landmark') ? 'is-invalid' : '' }}" name="landmark_id" id="landmark_id" required>
                    @foreach($landmarks as $id => $entry)
                        <option value="{{ $id }}" {{ old('landmark_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('landmark'))
                    <span class="text-danger">{{ $errors->first('landmark') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userLandmark.fields.landmark_helper') }}</span>
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