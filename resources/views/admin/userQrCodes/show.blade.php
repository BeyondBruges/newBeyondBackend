@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userQrCode.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-qr-codes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userQrCode.fields.id') }}
                        </th>
                        <td>
                            {{ $userQrCode->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userQrCode.fields.user') }}
                        </th>
                        <td>
                            {{ $userQrCode->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userQrCode.fields.qr') }}
                        </th>
                        <td>
                            {{ $userQrCode->qr->transaction_total ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-qr-codes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection