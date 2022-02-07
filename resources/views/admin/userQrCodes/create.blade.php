@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.userQrCode.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-qr-codes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.userQrCode.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userQrCode.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qr_id">{{ trans('cruds.userQrCode.fields.qr') }}</label>
                <select class="form-control select2 {{ $errors->has('qr') ? 'is-invalid' : '' }}" name="qr_id" id="qr_id">
                    @foreach($qrs as $id => $entry)
                        <option value="{{ $id }}" {{ old('qr_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('qr'))
                    <span class="text-danger">{{ $errors->first('qr') }}</span>
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



@endsection