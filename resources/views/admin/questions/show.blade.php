@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.question.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.questions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.id') }}
                        </th>
                        <td>
                            {{ $question->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.level') }}
                        </th>
                        <td>
                            {{ $question->level->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.title') }}
                        </th>
                        <td>
                            {{ $question->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.correct') }}
                        </th>
                        <td>
                            {{ $question->correct }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.key') }}
                        </th>
                        <td>
                            {{ $question->key }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.questions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection