@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Side Quest
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-side-quests.update", $sidequest->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            

            <div class="form-group">
                <label class="required" for="user_id">user</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $entry)
                        <option value="{{ $entry->id }}" {{ $sidequest->user_id == $entry->id ? 'selected' : '' }}>{{ $entry->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userLandmark.fields.landmark_helper') }}</span>
            </div>            

            <div class="form-group">
                <label class="required" for="side-quest_id">side quest</label>
                <select class="form-control select2 {{ $errors->has('side-quest') ? 'is-invalid' : '' }}" name="side_quest_id" id="side-quest_id" required>
                    @foreach($sidequests as $entry)
                        <option value="{{ $entry->id }}" {{ $sidequest->side_quest_id == $entry->id ? 'selected' : '' }}>{{ $entry->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('side-quest'))
                    <span class="text-danger">{{ $errors->first('side-quest') }}</span>
                @endif
 
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

@section('scripts')

@endsection