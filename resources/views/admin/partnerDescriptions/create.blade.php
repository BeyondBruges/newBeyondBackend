@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.partnerDescription.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.partner-descriptions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="partner_id">{{ trans('cruds.partnerDescription.fields.partner') }}</label>
                <select class="form-control select2 {{ $errors->has('partner') ? 'is-invalid' : '' }}" name="partner_id" id="partner_id">
                    @foreach($partners as $id => $entry)
                        <option value="{{ $id }}" {{ old('partner_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('partner'))
                    <span class="text-danger">{{ $errors->first('partner') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerDescription.fields.partner_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="language_id">{{ trans('cruds.partnerDescription.fields.language') }}</label>
                <select class="form-control select2 {{ $errors->has('language') ? 'is-invalid' : '' }}" name="language_id" id="language_id" required>
                    @foreach($languages as $id => $entry)
                        <option value="{{ $id }}" {{ old('language_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('language'))
                    <span class="text-danger">{{ $errors->first('language') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerDescription.fields.language_helper') }}</span>
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