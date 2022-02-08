@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.appMenuButton.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.app-menu-buttons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.appMenuButton.fields.id') }}
                        </th>
                        <td>
                            {{ $appMenuButton->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appMenuButton.fields.name') }}
                        </th>
                        <td>
                            {{ $appMenuButton->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appMenuButton.fields.key') }}
                        </th>
                        <td>
                            {{ $appMenuButton->key }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appMenuButton.fields.status') }}
                        </th>
                        <td>
                            {{ $appMenuButton->status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.app-menu-buttons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection