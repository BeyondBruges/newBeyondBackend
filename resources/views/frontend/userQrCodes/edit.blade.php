@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.userQrCode.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.user-qr-codes.update", [$userQrCode->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.userQrCode.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $userQrCode->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userQrCode.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="qr_id">{{ trans('cruds.userQrCode.fields.qr') }}</label>
                            <select class="form-control select2" name="qr_id" id="qr_id">
                                @foreach($qrs as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('qr_id') ? old('qr_id') : $userQrCode->qr->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('qr'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('qr') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userQrCode.fields.qr_helper') }}</span>
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