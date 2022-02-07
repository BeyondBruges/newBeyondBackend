@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sellingPoint.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.selling-points.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sellingPoint.fields.id') }}
                        </th>
                        <td>
                            {{ $sellingPoint->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sellingPoint.fields.icon_code') }}
                        </th>
                        <td>
                            {{ $sellingPoint->icon_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sellingPoint.fields.title') }}
                        </th>
                        <td>
                            {{ $sellingPoint->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sellingPoint.fields.description') }}
                        </th>
                        <td>
                            {{ $sellingPoint->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sellingPoint.fields.language') }}
                        </th>
                        <td>
                            {{ $sellingPoint->language->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.selling-points.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection