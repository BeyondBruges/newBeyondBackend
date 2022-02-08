@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.level.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.levels.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.level.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $level->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.level.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $level->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.level.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $level->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.level.fields.lat') }}
                                    </th>
                                    <td>
                                        {{ $level->lat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.level.fields.lng') }}
                                    </th>
                                    <td>
                                        {{ $level->lng }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.level.fields.image') }}
                                    </th>
                                    <td>
                                        @if($level->image)
                                            <a href="{{ $level->image->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.level.fields.key') }}
                                    </th>
                                    <td>
                                        {{ $level->key }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.levels.index') }}">
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