@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.userDynamicCoupon.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-dynamic-coupons.update", [$userDynamicCoupon->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.userDynamicCoupon.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $userDynamicCoupon->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userDynamicCoupon.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dynamic_coupon_id">{{ trans('cruds.userDynamicCoupon.fields.dynamic_coupon') }}</label>
                <select class="form-control select2 {{ $errors->has('dynamic_coupon') ? 'is-invalid' : '' }}" name="dynamic_coupon_id" id="dynamic_coupon_id" required>
                    @foreach($dynamic_coupons as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dynamic_coupon_id') ? old('dynamic_coupon_id') : $userDynamicCoupon->dynamic_coupon->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dynamic_coupon'))
                    <span class="text-danger">{{ $errors->first('dynamic_coupon') }}</span>
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



@endsection