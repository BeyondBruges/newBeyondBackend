@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.qrCode.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.qr-codes.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="transaction_total">{{ trans('cruds.qrCode.fields.transaction_total') }}</label>
                            <input class="form-control" type="number" name="transaction_total" id="transaction_total" value="{{ old('transaction_total', '') }}" step="1" required>
                            @if($errors->has('transaction_total'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('transaction_total') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.qrCode.fields.transaction_total_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="issued_bryghia">{{ trans('cruds.qrCode.fields.issued_bryghia') }}</label>
                            <input class="form-control" type="number" name="issued_bryghia" id="issued_bryghia" value="{{ old('issued_bryghia', '') }}" step="1" required>
                            @if($errors->has('issued_bryghia'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('issued_bryghia') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.qrCode.fields.issued_bryghia_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.qrCode.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.qrCode.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="partner_id">{{ trans('cruds.qrCode.fields.partner') }}</label>
                            <select class="form-control select2" name="partner_id" id="partner_id" required>
                                @foreach($partners as $id => $entry)
                                    <option value="{{ $id }}" {{ old('partner_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('partner'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('partner') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.qrCode.fields.partner_helper') }}</span>
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