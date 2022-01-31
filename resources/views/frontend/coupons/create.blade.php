@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.coupon.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.coupons.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.coupon.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="description">{{ trans('cruds.coupon.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description" required>{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="value">{{ trans('cruds.coupon.fields.value') }}</label>
                            <input class="form-control" type="number" name="value" id="value" value="{{ old('value', '') }}" step="0.01">
                            @if($errors->has('value'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('value') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.value_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.coupon.fields.coupontype') }}</label>
                            <select class="form-control" name="coupontype" id="coupontype" required>
                                <option value disabled {{ old('coupontype', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Coupon::COUPONTYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('coupontype', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('coupontype'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('coupontype') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.coupontype_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="partner_id">{{ trans('cruds.coupon.fields.partner') }}</label>
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
                            <span class="help-block">{{ trans('cruds.coupon.fields.partner_helper') }}</span>
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