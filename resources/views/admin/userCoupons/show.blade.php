@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userCoupon.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-coupons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userCoupon.fields.id') }}
                        </th>
                        <td>
                            {{ $userCoupon->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userCoupon.fields.user') }}
                        </th>
                        <td>
                            {{ $userCoupon->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userCoupon.fields.coupon') }}
                        </th>
                        <td>
                            {{ $userCoupon->coupon->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-coupons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection