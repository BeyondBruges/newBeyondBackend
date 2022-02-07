@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.character.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.characters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.character.fields.id') }}
                        </th>
                        <td>
                            {{ $character->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.character.fields.name') }}
                        </th>
                        <td>
                            {{ $character->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.character.fields.image') }}
                        </th>
                        <td>
                            @if($character->image)
                                <a href="{{ $character->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $character->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.character.fields.bio') }}
                        </th>
                        <td>
                            {!! $character->bio !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.character.fields.key') }}
                        </th>
                        <td>
                            {{ $character->key }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.characters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection