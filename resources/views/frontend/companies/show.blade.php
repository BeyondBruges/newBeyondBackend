@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.company.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.companies.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.company.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $company->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.company.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $company->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.company.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $company->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.company.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $company->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.company.fields.lat') }}
                                    </th>
                                    <td>
                                        {{ $company->lat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.company.fields.lng') }}
                                    </th>
                                    <td>
                                        {{ $company->lng }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.company.fields.logo_white') }}
                                    </th>
                                    <td>
                                        @if($company->logo_white)
                                            <a href="{{ $company->logo_white->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $company->logo_white->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.company.fields.logo_color') }}
                                    </th>
                                    <td>
                                        @if($company->logo_color)
                                            <a href="{{ $company->logo_color->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $company->logo_color->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.company.fields.favicon') }}
                                    </th>
                                    <td>
                                        @if($company->favicon)
                                            <a href="{{ $company->favicon->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.company.fields.logo') }}
                                    </th>
                                    <td>
                                        @if($company->logo)
                                            <a href="{{ $company->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $company->logo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.company.fields.google_analyitics') }}
                                    </th>
                                    <td>
                                        {{ $company->google_analyitics }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.company.fields.sendinblue_user') }}
                                    </th>
                                    <td>
                                        {{ $company->sendinblue_user }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.company.fields.sendinblue_password') }}
                                    </th>
                                    <td>
                                        {{ $company->sendinblue_password }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.company.fields.onesignal_appid') }}
                                    </th>
                                    <td>
                                        {{ $company->onesignal_appid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.company.fields.onesignal_apikey') }}
                                    </th>
                                    <td>
                                        {{ $company->onesignal_apikey }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.companies.index') }}">
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