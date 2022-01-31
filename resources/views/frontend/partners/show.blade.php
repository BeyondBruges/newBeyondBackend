@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.partner.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.partners.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.partner.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $partner->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.partner.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $partner->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.partner.fields.url') }}
                                    </th>
                                    <td>
                                        {{ $partner->url }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.partner.fields.logo') }}
                                    </th>
                                    <td>
                                        @if($partner->logo)
                                            <a href="{{ $partner->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $partner->logo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.partner.fields.lat') }}
                                    </th>
                                    <td>
                                        {{ $partner->lat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.partner.fields.lng') }}
                                    </th>
                                    <td>
                                        {{ $partner->lng }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.partner.fields.gallery') }}
                                    </th>
                                    <td>
                                        @foreach($partner->gallery as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.partner.fields.facebook') }}
                                    </th>
                                    <td>
                                        {{ $partner->facebook }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.partner.fields.twitter') }}
                                    </th>
                                    <td>
                                        {{ $partner->twitter }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.partner.fields.instagram') }}
                                    </th>
                                    <td>
                                        {{ $partner->instagram }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.partner.fields.tiktok') }}
                                    </th>
                                    <td>
                                        {{ $partner->tiktok }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.partners.index') }}">
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