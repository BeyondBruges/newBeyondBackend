@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bryghia
                        </th>
                        <td>
                            {{ $user->bryghia }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            Device
                        </th>
                        <td>
                            {{ $user->device }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.udid') }}
                        </th>
                        <td>
                            {{ $user->udid }}
                        </td>
                    </tr>
                </tbody>
            </table>

            {{--<div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>--}}

{{--Pills--}}
    <div class="row">
        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$user->userUserLandmarks->count()}}</h3>
                <p>Unlocked Landmarks</p>
              </div>
            </div>
        </div>

        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{$user->userUserLevels->count()}}</h3>
                <p>Unlocked Levels</p>
              </div>
            </div>
        </div>

        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$user->userUserQrCodes->count()}}</h3>
                <p>Generated QRs</p>
              </div>
            </div>
        </div>

        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$user->userUserTransactions->count()}}</h3>
                <p>Transactions Made</p>
              </div>
            </div>
        </div>

        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$user->userUserCoupons->count()}}</h3>
                <p>Generated Coupons</p>
              </div>
            </div>
        </div>

        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$user->userUserDynamicCoupons->count()}}</h3>
                <p>Generated Dynamic Coupons</p>
              </div>
            </div>
        </div>

        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3>{{$user->userUserLevelObjects->count()}}</h3>
                <p>Unlocked Level Objects</p>
              </div>
            </div>
        </div>  

        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{$user->userUserLevelQuestions->count()}}</h3>
                <p>Unlocked Level Questions</p>
              </div>
            </div>
        </div>  
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
            <a class="nav-link" href="#user_transactions" role="tab" data-toggle="tab">
                {{ trans('cruds.transaction.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_partner_users" role="tab" data-toggle="tab">
                {{ trans('cruds.partnerUser.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_landmarks" role="tab" data-toggle="tab">
                {{ trans('cruds.userLandmark.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_levels" role="tab" data-toggle="tab">
                {{ trans('cruds.userLevel.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_qr_codes" role="tab" data-toggle="tab">
                {{ trans('cruds.userQrCode.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_transactions" role="tab" data-toggle="tab">
                {{ trans('cruds.userTransaction.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_coupons" role="tab" data-toggle="tab">
                {{ trans('cruds.userCoupon.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_dynamic_coupons" role="tab" data-toggle="tab">
                {{ trans('cruds.userDynamicCoupon.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_level_objects" role="tab" data-toggle="tab">
                {{ trans('cruds.userLevelObject.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_level_questions" role="tab" data-toggle="tab">
                {{ trans('cruds.userLevelQuestion.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="user_transactions">
            @includeIf('admin.users.relationships.userTransactions', ['transactions' => $user->userTransactions])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_partner_users">
            @includeIf('admin.users.relationships.userPartnerUsers', ['partnerUsers' => $user->userPartnerUsers])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_landmarks">
            @includeIf('admin.users.relationships.userUserLandmarks', ['userLandmarks' => $user->userUserLandmarks])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_levels">
            @includeIf('admin.users.relationships.userUserLevels', ['userLevels' => $user->userUserLevels])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_qr_codes">
            @includeIf('admin.users.relationships.userUserQrCodes', ['userQrCodes' => $user->userUserQrCodes])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_transactions">
            @includeIf('admin.users.relationships.userUserTransactions', ['userTransactions' => $user->userUserTransactions])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_coupons">
            @includeIf('admin.users.relationships.userUserCoupons', ['userCoupons' => $user->userUserCoupons])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_dynamic_coupons">
            @includeIf('admin.users.relationships.userUserDynamicCoupons', ['userDynamicCoupons' => $user->userUserDynamicCoupons])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_level_objects">
            @includeIf('admin.users.relationships.userUserLevelObjects', ['userLevelObjects' => $user->userUserLevelObjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_level_questions">
            @includeIf('admin.users.relationships.userUserLevelQuestions', ['userLevelQuestions' => $user->userUserLevelQuestions])
        </div>
    </div>
</div>

@endsection