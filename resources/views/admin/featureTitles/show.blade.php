@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.featureTitle.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.feature-titles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.featureTitle.fields.id') }}
                        </th>
                        <td>
                            {{ $featureTitle->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.featureTitle.fields.title') }}
                        </th>
                        <td>
                            {{ $featureTitle->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.featureTitle.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $featureTitle->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.featureTitle.fields.language') }}
                        </th>
                        <td>
                            {{ $featureTitle->language->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.feature-titles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection