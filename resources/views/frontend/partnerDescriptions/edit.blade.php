@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.partnerDescription.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.partner-descriptions.update", [$partnerDescription->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="partner_id">{{ trans('cruds.partnerDescription.fields.partner') }}</label>
                            <select class="form-control select2" name="partner_id" id="partner_id">
                                @foreach($partners as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('partner_id') ? old('partner_id') : $partnerDescription->partner->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('partner'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('partner') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.partnerDescription.fields.partner_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="language_id">{{ trans('cruds.partnerDescription.fields.language') }}</label>
                            <select class="form-control select2" name="language_id" id="language_id" required>
                                @foreach($languages as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('language_id') ? old('language_id') : $partnerDescription->language->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('language'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('language') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection