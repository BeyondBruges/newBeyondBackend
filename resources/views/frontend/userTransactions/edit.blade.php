@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.userTransaction.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.user-transactions.update", [$userTransaction->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.userTransaction.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $userTransaction->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userTransaction.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="transaction_id">{{ trans('cruds.userTransaction.fields.transaction') }}</label>
                            <select class="form-control select2" name="transaction_id" id="transaction_id" required>
                                @foreach($transactions as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('transaction_id') ? old('transaction_id') : $userTransaction->transaction->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('transaction'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('transaction') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userTransaction.fields.transaction_helper') }}</span>
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