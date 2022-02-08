@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.dialogue.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dialogues.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="key">{{ trans('cruds.dialogue.fields.key') }}</label>
                <input class="form-control {{ $errors->has('key') ? 'is-invalid' : '' }}" type="text" name="key" id="key" value="{{ old('key', '') }}">
                @if($errors->has('key'))
                    <span class="text-danger">{{ $errors->first('key') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dialogue.fields.key_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hotspot_id">{{ trans('cruds.dialogue.fields.hotspot') }}</label>
                <select class="form-control select2 {{ $errors->has('hotspot') ? 'is-invalid' : '' }}" name="hotspot_id" id="hotspot_id">
                    @foreach($hotspots as $id => $entry)
                        <option value="{{ $id }}" {{ old('hotspot_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('hotspot'))
                    <span class="text-danger">{{ $errors->first('hotspot') }}</span>
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



@endsection