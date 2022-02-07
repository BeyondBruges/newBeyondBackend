@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.appPopup.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.app-popups.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.appPopup.fields.id') }}
                        </th>
                        <td>
                            {{ $appPopup->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPopup.fields.language') }}
                        </th>
                        <td>
                            {{ $appPopup->language->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPopup.fields.title') }}
                        </th>
                        <td>
                            {{ $appPopup->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPopup.fields.content') }}
                        </th>
                        <td>
                            {!! $appPopup->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPopup.fields.status') }}
                        </th>
                        <td>
                            {{ $appPopup->status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.app-popups.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection