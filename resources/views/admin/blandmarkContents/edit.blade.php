@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.blandmarkContent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.blandmark-contents.update", [$blandmarkContent->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="landmark_id">{{ trans('cruds.blandmarkContent.fields.landmark') }}</label>
                <select class="form-control select2 {{ $errors->has('landmark') ? 'is-invalid' : '' }}" name="landmark_id" id="landmark_id" required>
                    @foreach($landmarks as $id => $entry)
                        <option value="{{ $id }}" {{ (old('landmark_id') ? old('landmark_id') : $blandmarkContent->landmark->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('landmark'))
                    <span class="text-danger">{{ $errors->first('landmark') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.blandmarkContent.fields.landmark_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="key">{{ trans('cruds.blandmarkContent.fields.key') }}</label>
                <input class="form-control {{ $errors->has('key') ? 'is-invalid' : '' }}" type="text" name="key" id="key" value="{{ old('key', $blandmarkContent->key) }}" required>
                @if($errors->has('key'))
                    <span class="text-danger">{{ $errors->first('key') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.blandmarkContent.fields.key_helper') }}</span>
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