@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.dynamicCoupon.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.dynamic-coupons.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dynamicCoupon.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $dynamicCoupon->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dynamicCoupon.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $dynamicCoupon->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dynamicCoupon.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $dynamicCoupon->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dynamicCoupon.fields.product') }}
                                    </th>
                                    <td>
                                        {{ $dynamicCoupon->product->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dynamicCoupon.fields.expiration') }}
                                    </th>
                                    <td>
                                        {{ $dynamicCoupon->expiration }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.dynamic-coupons.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection