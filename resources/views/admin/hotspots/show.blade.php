@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hotspot.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hotspots.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hotspot.fields.id') }}
                        </th>
                        <td>
                            {{ $hotspot->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotspot.fields.name') }}
                        </th>
                        <td>
                            {{ $hotspot->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotspot.fields.level') }}
                        </th>
                        <td>
                            {{ $hotspot->level->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotspot.fields.key') }}
                        </th>
                        <td>
                            {{ $hotspot->key }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hotspots.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection