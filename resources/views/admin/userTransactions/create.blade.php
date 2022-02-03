@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.userTransaction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-transactions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.userTransaction.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userTransaction.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transaction_id">{{ trans('cruds.userTransaction.fields.transaction') }}</label>
                <select class="form-control select2 {{ $errors->has('transaction') ? 'is-invalid' : '' }}" name="transaction_id" id="transaction_id" required>
                    @foreach($transactions as $id => $entry)
                        <option value="{{ $id }}" {{ old('transaction_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('transaction'))
                    <span class="text-danger">{{ $errors->first('transaction') }}</span>
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



@endsection