@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.question.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questions.update", [$question->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="level_id">{{ trans('cruds.question.fields.level') }}</label>
                <select class="form-control select2 {{ $errors->has('level') ? 'is-invalid' : '' }}" name="level_id" id="level_id" required>
                    @foreach($levels as $id => $entry)
                        <option value="{{ $id }}" {{ (old('level_id') ? old('level_id') : $question->level->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('level'))
                    <span class="text-danger">{{ $errors->first('level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.level_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.question.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $question->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="correct">{{ trans('cruds.question.fields.correct') }}</label>
                <input class="form-control {{ $errors->has('correct') ? 'is-invalid' : '' }}" type="text" name="correct" id="correct" value="{{ old('correct', $question->correct) }}">
                @if($errors->has('correct'))
                    <span class="text-danger">{{ $errors->first('correct') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.correct_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="key">{{ trans('cruds.question.fields.key') }}</label>
                <input class="form-control {{ $errors->has('key') ? 'is-invalid' : '' }}" type="text" name="key" id="key" value="{{ old('key', $question->key) }}">
                @if($errors->has('key'))
                    <span class="text-danger">{{ $errors->first('key') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.key_helper') }}</span>
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