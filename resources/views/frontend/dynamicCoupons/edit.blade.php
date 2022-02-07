@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.dynamicCoupon.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.dynamic-coupons.update", [$dynamicCoupon->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.dynamicCoupon.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $dynamicCoupon->name) }}" required>
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
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $dynamicCoupon->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <label class="required" for="expiration">{{ trans('cruds.dynamicCoupon.fields.expiration') }}</label>
                            <input class="form-control datetime" type="text" name="expiration" id="expiration" value="{{ old('expiration', $dynamicCoupon->expiration) }}" required>
                            @if($errors->has('expiration'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('expiration') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dynamicCoupon.fields.expiration_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="products">{{ trans('cruds.dynamicCoupon.fields.product') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="products[]" id="products" multiple>
                                @foreach($products as $id => $product)
                                    <option value="{{ $id }}" {{ (in_array($id, old('products', [])) || $dynamicCoupon->products->contains($id)) ? 'selected' : '' }}>{{ $product }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('products'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('products') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dynamicCoupon.fields.product_helper') }}</span>
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