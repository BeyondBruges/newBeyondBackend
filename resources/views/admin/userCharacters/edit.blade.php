@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.userCharacter.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-characters.update", [$userCharacter->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.userCharacter.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $userCharacter->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userCharacter.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="character_id">{{ trans('cruds.userCharacter.fields.character') }}</label>
                <select class="form-control select2 {{ $errors->has('character') ? 'is-invalid' : '' }}" name="character_id" id="character_id">
                    @foreach($characters as $id => $entry)
                        <option value="{{ $id }}" {{ (old('character_id') ? old('character_id') : $userCharacter->character->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('character'))
                    <span class="text-danger">{{ $errors->first('character') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userCharacter.fields.character_helper') }}</span>
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