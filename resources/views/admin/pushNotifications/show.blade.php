@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.notification.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.push-notifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.notification.fields.id') }}
                        </th>
                        <td>
                            {{ $notification->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            key
                        </th>
                        <td>
                            {{ $notification->key }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            en_title
                        </th>
                        <td>
                            {{ $notification->en_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            es_title
                        </th>
                        <td>
                            {{ $notification->es_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            nl_title
                        </th>
                        <td>
                            {{ $notification->nl_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            fr_title
                        </th>
                        <td>
                            {{ $notification->fr_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            en_content
                        </th>
                        <td>
                            {{ $notification->en_content }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            es_content
                        </th>
                        <td>
                            {{ $notification->es_content }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            nl_content
                        </th>
                        <td>
                            {{ $notification->nl_content }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            fr_content
                        </th>
                        <td>
                            {{ $notification->fr_content }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.push-notifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
