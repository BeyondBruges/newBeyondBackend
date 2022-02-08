@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.userCoupon.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-coupons.update", [$userCoupon->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.userCoupon.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $userCoupon->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userCoupon.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="coupon_id">{{ trans('cruds.userCoupon.fields.coupon') }}</label>
                <select class="form-control select2 {{ $errors->has('coupon') ? 'is-invalid' : '' }}" name="coupon_id" id="coupon_id">
                    @foreach($coupons as $id => $entry)
                        <option value="{{ $id }}" {{ (old('coupon_id') ? old('coupon_id') : $userCoupon->coupon->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('coupon'))
                    <span class="text-danger">{{ $errors->first('coupon') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userCoupon.fields.coupon_helper') }}</span>
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