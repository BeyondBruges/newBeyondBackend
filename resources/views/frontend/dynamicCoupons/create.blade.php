@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.dynamicCoupon.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.dynamic-coupons.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.dynamicCoupon.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dynamicCoupon.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.dynamicCoupon.fields.user') }}</label>
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
                            <span class="help-block">{{ trans('cruds.dynamicCoupon.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="product_id">{{ trans('cruds.dynamicCoupon.fields.product') }}</label>
                            <select class="form-control select2" name="product_id" id="product_id" required>
                                @foreach($products as $id => $entry)
                                    <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('product') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dynamicCoupon.fields.product_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="expiration">{{ trans('cruds.dynamicCoupon.fields.expiration') }}</label>
                            <input class="form-control datetime" type="text" name="expiration" id="expiration" value="{{ old('expiration') }}" required>
                            @if($errors->has('expiration'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('expiration') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dynamicCoupon.fields.expiration_helper') }}</span>
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