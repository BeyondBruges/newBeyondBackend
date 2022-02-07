@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.question.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.questions.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="level_id">{{ trans('cruds.question.fields.level') }}</label>
                            <select class="form-control select2" name="level_id" id="level_id" required>
                                @foreach($levels as $id => $entry)
                                    <option value="{{ $id }}" {{ old('level_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('level'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('level') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.question.fields.level_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.question.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.question.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="correct">{{ trans('cruds.question.fields.correct') }}</label>
                            <input class="form-control" type="text" name="correct" id="correct" value="{{ old('correct', '') }}">
                            @if($errors->has('correct'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('correct') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.question.fields.correct_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="key">{{ trans('cruds.question.fields.key') }}</label>
                            <input class="form-control" type="text" name="key" id="key" value="{{ old('key', '') }}">
                            @if($errors->has('key'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('key') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection