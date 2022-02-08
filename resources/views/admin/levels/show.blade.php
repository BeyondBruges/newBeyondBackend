@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.level.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.levels.index') }}">
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
                <a class="btn btn-default" href="{{ route('admin.levels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#level_questions" role="tab" data-toggle="tab">
                {{ trans('cruds.question.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#level_hotspots" role="tab" data-toggle="tab">
                {{ trans('cruds.hotspot.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="level_questions">
            @includeIf('admin.levels.relationships.levelQuestions', ['questions' => $level->levelQuestions])
        </div>
        <div class="tab-pane" role="tabpanel" id="level_hotspots">
            @includeIf('admin.levels.relationships.levelHotspots', ['hotspots' => $level->levelHotspots])
        </div>
    </div>
</div>

@endsection