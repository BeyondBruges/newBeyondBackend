@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.appMenuButton.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.app-menu-buttons.update", [$appMenuButton->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.appMenuButton.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $appMenuButton->name) }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.appMenuButton.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="key">{{ trans('cruds.appMenuButton.fields.key') }}</label>
                            <input class="form-control" type="text" name="key" id="key" value="{{ old('key', $appMenuButton->key) }}">
                            @if($errors->has('key'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('key') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.appMenuButton.fields.key_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.appMenuButton.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $appMenuButton->status) }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.appMenuButton.fields.status_helper') }}</span>
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