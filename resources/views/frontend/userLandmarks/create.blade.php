@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.userLandmark.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.user-landmarks.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.userLandmark.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userLandmark.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="landmark_id">{{ trans('cruds.userLandmark.fields.landmark') }}</label>
                            <select class="form-control select2" name="landmark_id" id="landmark_id" required>
                                @foreach($landmarks as $id => $entry)
                                    <option value="{{ $id }}" {{ old('landmark_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('landmark'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('landmark') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection