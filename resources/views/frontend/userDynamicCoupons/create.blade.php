@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.userDynamicCoupon.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.user-dynamic-coupons.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.userDynamicCoupon.fields.user') }}</label>
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
                            <span class="help-block">{{ trans('cruds.userDynamicCoupon.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="dynamic_coupon_id">{{ trans('cruds.userDynamicCoupon.fields.dynamic_coupon') }}</label>
                            <select class="form-control select2" name="dynamic_coupon_id" id="dynamic_coupon_id" required>
                                @foreach($dynamic_coupons as $id => $entry)
                                    <option value="{{ $id }}" {{ old('dynamic_coupon_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('dynamic_coupon'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dynamic_coupon') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userDynamicCoupon.fields.dynamic_coupon_helper') }}</span>
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