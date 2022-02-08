@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.hotspot.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.hotspots.update", [$hotspot->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.hotspot.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $hotspot->name) }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hotspot.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="level_id">{{ trans('cruds.hotspot.fields.level') }}</label>
                            <select class="form-control select2" name="level_id" id="level_id" required>
                                @foreach($levels as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('level_id') ? old('level_id') : $hotspot->level->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('level'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('level') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hotspot.fields.level_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="key">{{ trans('cruds.hotspot.fields.key') }}</label>
                            <input class="form-control" type="text" name="key" id="key" value="{{ old('key', $hotspot->key) }}">
                            @if($errors->has('key'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('key') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection