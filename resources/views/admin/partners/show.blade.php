@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.partner.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.partners.index') }}">
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
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.email') }}
                        </th>
                        <td>
                            {{ $partner->email }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.partners.index') }}">
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
            <a class="nav-link" href="#partner_coupons" role="tab" data-toggle="tab">
                {{ trans('cruds.coupon.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#partner_partner_users" role="tab" data-toggle="tab">
                {{ trans('cruds.partnerUser.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#partner_partner_descriptions" role="tab" data-toggle="tab">
                {{ trans('cruds.partnerDescription.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="partner_coupons">
            @includeIf('admin.partners.relationships.partnerCoupons', ['coupons' => $partner->partnerCoupons])
        </div>
        <div class="tab-pane" role="tabpanel" id="partner_partner_users">
            @includeIf('admin.partners.relationships.partnerPartnerUsers', ['partnerUsers' => $partner->partnerPartnerUsers])
        </div>
        <div class="tab-pane" role="tabpanel" id="partner_partner_descriptions">
            @includeIf('admin.partners.relationships.partnerPartnerDescriptions', ['partnerDescriptions' => $partner->partnerPartnerDescriptions])
        </div>
    </div>
</div>

@endsection