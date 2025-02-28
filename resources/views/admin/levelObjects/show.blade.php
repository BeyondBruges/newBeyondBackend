@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.levelObject.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.level-objects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.levelObject.fields.id') }}
                        </th>
                        <td>
                            {{ $levelObject->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelObject.fields.name') }}
                        </th>
                        <td>
                            {{ $levelObject->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelObject.fields.level') }}
                        </th>
                        <td>
                            {{ $levelObject->level->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelObject.fields.description') }}
                        </th>
                        <td>
                            {!! $levelObject->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelObject.fields.key') }}
                        </th>
                        <td>
                            {{ $levelObject->key }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.level-objects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection