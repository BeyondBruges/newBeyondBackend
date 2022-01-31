@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.bLandMark.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.b-land-marks.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bLandMark.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $bLandMark->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bLandMark.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $bLandMark->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bLandMark.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $bLandMark->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bLandMark.fields.lat') }}
                                    </th>
                                    <td>
                                        {{ $bLandMark->lat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bLandMark.fields.lng') }}
                                    </th>
                                    <td>
                                        {{ $bLandMark->lng }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bLandMark.fields.image') }}
                                    </th>
                                    <td>
                                        @if($bLandMark->image)
                                            <a href="{{ $bLandMark->image->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bLandMark.fields.description_a') }}
                                    </th>
                                    <td>
                                        {!! $bLandMark->description_a !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bLandMark.fields.description_b') }}
                                    </th>
                                    <td>
                                        {!! $bLandMark->description_b !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.b-land-marks.index') }}">
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