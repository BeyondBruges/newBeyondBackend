@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.dialogue.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.dialogues.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="key">{{ trans('cruds.dialogue.fields.key') }}</label>
                            <input class="form-control" type="text" name="key" id="key" value="{{ old('key', '') }}">
                            @if($errors->has('key'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('key') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dialogue.fields.key_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="hotspot_id">{{ trans('cruds.dialogue.fields.hotspot') }}</label>
                            <select class="form-control select2" name="hotspot_id" id="hotspot_id">
                                @foreach($hotspots as $id => $entry)
                                    <option value="{{ $id }}" {{ old('hotspot_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('hotspot'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('hotspot') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dialogue.fields.hotspot_helper') }}</span>
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