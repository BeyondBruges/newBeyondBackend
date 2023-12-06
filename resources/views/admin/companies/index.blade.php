@extends('layouts.admin')
@section('styles')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      GPS Radius in kms

    </div>


    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route("admin.radius") }}" enctype="multipart/form-data">
                    @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa-fw nav-icon fas fa-map">
                        </i>
                    </span>

                    <input type="text" class="form-control" placeholder="radius" aria-label="radius" aria-describedby="basic-addon1" name="radius" value="{{$company->radius}}">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
     email Template
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <form method="POST" action="{{ route("admin.emailtexts") }}" enctype="multipart/form-data">
                    @csrf
                    <p>This is a representation of the email that new users will receive</p>
                    <hr>
                    <img src="{{$emailContents->email_image_top}}" alt="" width="100%">
                    <br>
                    <br>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-fw nav-icon fas fa-image">
                            </i>
                        </span>

                        <input type="text" class="form-control" placeholder="radius" aria-label="radius" aria-describedby="basic-addon1" name="emal_image_top" value="{{$emailContents->email_image_top}}">
                      </div>
                    <br>
                    <br>
                    <h2>{UserName}</h2>
                    <small>This will show the registered user's name</small>
                    <br>
                    <br>

                    <div class="col-12">
                        <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home0" role="tab" aria-controls="custom-tabs-four-home0" aria-selected="true">Eng</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile0" role="tab" aria-controls="custom-tabs-four-profile0" aria-selected="false">Nl</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages0" role="tab" aria-controls="custom-tabs-four-messages0" aria-selected="false">Esp</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings0" role="tab" aria-controls="custom-tabs-four-settings0" aria-selected="false">Fr</a>
                        </li>
                        </ul>
                        </div>
                        <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-home0" role="tabpanel" aria-labelledby="custom-tabs-four-home0-tab">

                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('en_welcome') ? 'is-invalid' : '' }}" name="en_welcome" id="en_welcome">{!! $emailContents->en_welcome !!}</textarea>
                                @if($errors->has('en_welcome'))
                                    <span class="text-danger">{{ $errors->first('en_welcome') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-profile0" role="tabpanel" aria-labelledby="custom-tabs-four-profile0-tab">


                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('nl_welcome') ? 'is-invalid' : '' }}" name="nl_welcome" id="nl_welcome">{!! $emailContents->nl_welcome !!}</textarea>
                                @if($errors->has('nl_welcome'))
                                    <span class="text-danger">{{ $errors->first('nl_welcome') }}</span>
                                @endif
                            </div>


                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-messages0" role="tabpanel" aria-labelledby="custom-tabs-four-messages0-tab">



                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('es_welcome') ? 'is-invalid' : '' }}" name="es_welcome" id="es_welcome">{!! $emailContents->es_welcome !!}</textarea>
                                @if($errors->has('es_welcome'))
                                    <span class="text-danger">{{ $errors->first('es_welcome') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-settings0" role="tabpanel" aria-labelledby="custom-tabs-four-settings0-tab">


                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('fr_welcome') ? 'is-invalid' : '' }}" name="fr_welcome" id="fr_welcome">{!! $emailContents->fr_welcome !!}</textarea>
                                @if($errors->has('fr_welcome'))
                                    <span class="text-danger">{{ $errors->first('fr_welcome') }}</span>
                                @endif
                            </div>

                        </div>
                        </div>
                        </div>

                        </div>
                        <small>This is the message right after the name</small>

                    </div>


                    <br>
                    <div class="col-12">
                        <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Eng</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Nl</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Esp</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Fr</a>
                        </li>
                        </ul>
                        </div>
                        <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">

                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('en_welcome') ? 'is-invalid' : '' }}" name="en_welcome" id="en_welcome">{!! $emailContents->en_welcome !!}</textarea>
                                @if($errors->has('en_welcome'))
                                    <span class="text-danger">{{ $errors->first('en_welcome') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">


                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('nl_welcome') ? 'is-invalid' : '' }}" name="nl_welcome" id="nl_welcome">{!! $emailContents->nl_welcome !!}</textarea>
                                @if($errors->has('nl_welcome'))
                                    <span class="text-danger">{{ $errors->first('nl_welcome') }}</span>
                                @endif
                            </div>


                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">



                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('es_welcome') ? 'is-invalid' : '' }}" name="es_welcome" id="es_welcome">{!! $emailContents->es_welcome !!}</textarea>
                                @if($errors->has('es_welcome'))
                                    <span class="text-danger">{{ $errors->first('es_welcome') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">


                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('fr_welcome') ? 'is-invalid' : '' }}" name="fr_welcome" id="fr_welcome">{!! $emailContents->fr_welcome !!}</textarea>
                                @if($errors->has('fr_welcome'))
                                    <span class="text-danger">{{ $errors->first('fr_welcome') }}</span>
                                @endif
                            </div>

                        </div>
                        </div>
                        </div>

                        </div>
                    </div>
                    <center>
                        <img src="{{$emailContents->email_image_middle}}" alt="" width="40%">
                    </center>
                    <br>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-fw nav-icon fas fa-image">
                            </i>
                        </span>

                        <input type="text" class="form-control" placeholder="radius" aria-label="radius" aria-describedby="basic-addon1" name="emal_image_middle" value="{{$emailContents->email_image_middle}}">
                      </div>
                    <br>
                    <div class="col-12">
                        <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab1" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home1" role="tab" aria-controls="custom-tabs-four-home1" aria-selected="true">Eng</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile1" role="tab" aria-controls="custom-tabs-four-profile1" aria-selected="false">Nl</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages1" role="tab" aria-controls="custom-tabs-four-messages1" aria-selected="false">Esp</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings1" role="tab" aria-controls="custom-tabs-four-settings1" aria-selected="false">Fr</a>
                        </li>
                        </ul>
                        </div>
                        <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tab1Content">
                        <div class="tab-pane fade show active" id="custom-tabs-four-home1" role="tabpanel" aria-labelledby="custom-tabs-four-home1-tab">

                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('en_second') ? 'is-invalid' : '' }}" name="en_second" id="en_second">{!! $emailContents->en_second !!}</textarea>
                                @if($errors->has('en_second'))
                                    <span class="text-danger">{{ $errors->first('en_second') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-profile1" role="tabpanel" aria-labelledby="custom-tabs-four-profile1-tab">


                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('nl_second') ? 'is-invalid' : '' }}" name="nl_second" id="nl_second">{!! $emailContents->nl_second !!}</textarea>
                                @if($errors->has('nl_second'))
                                    <span class="text-danger">{{ $errors->first('nl_second') }}</span>
                                @endif
                            </div>


                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-messages1" role="tabpanel" aria-labelledby="custom-tabs-four-messages1-tab">



                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('es_second') ? 'is-invalid' : '' }}" name="es_second" id="es_second">{!! $emailContents->es_second !!}</textarea>
                                @if($errors->has('es_second'))
                                    <span class="text-danger">{{ $errors->first('es_second') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-settings1" role="tabpanel" aria-labelledby="custom-tabs-four-settings1-tab">


                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('fr_second') ? 'is-invalid' : '' }}" name="fr_second" id="fr_second">{!! $emailContents->fr_second !!}</textarea>
                                @if($errors->has('fr_second'))
                                    <span class="text-danger">{{ $errors->first('fr_second') }}</span>
                                @endif
                            </div>

                        </div>
                        </div>
                        </div>

                        </div>
                    </div>
                    <center>
                        <img src="/images/{{auth()->user()->id}}.png" alt="" width="40%">
                    </center>

                    <div class="col-12">
                        <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home3" role="tab" aria-controls="custom-tabs-four-home3" aria-selected="true">Eng</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile3" role="tab" aria-controls="custom-tabs-four-profile3" aria-selected="false">Nl</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages3" role="tab" aria-controls="custom-tabs-four-messages3" aria-selected="false">Esp</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings3" role="tab" aria-controls="custom-tabs-four-settings3" aria-selected="false">Fr</a>
                        </li>
                        </ul>
                        </div>
                        <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-home3" role="tabpanel" aria-labelledby="custom-tabs-four-home3-tab">

                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('en_third') ? 'is-invalid' : '' }}" name="en_third" id="en_third">{!! $emailContents->en_third !!}</textarea>
                                @if($errors->has('en_third'))
                                    <span class="text-danger">{{ $errors->first('en_third') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-profile3" role="tabpanel" aria-labelledby="custom-tabs-four-profile3-tab">


                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('nl_third') ? 'is-invalid' : '' }}" name="nl_third" id="nl_third">{!! $emailContents->nl_third !!}</textarea>
                                @if($errors->has('nl_third'))
                                    <span class="text-danger">{{ $errors->first('nl_third') }}</span>
                                @endif
                            </div>


                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-messages3" role="tabpanel" aria-labelledby="custom-tabs-four-messages3-tab">



                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('es_third') ? 'is-invalid' : '' }}" name="es_third" id="es_third">{!! $emailContents->es_third !!}</textarea>
                                @if($errors->has('es_third'))
                                    <span class="text-danger">{{ $errors->first('es_third') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-settings3" role="tabpanel" aria-labelledby="custom-tabs-four-settings3-tab">


                            <div class="form-group">
                                <textarea class="form-control ckeditor {{ $errors->has('fr_third') ? 'is-invalid' : '' }}" name="fr_third" id="fr_third">{!! $emailContents->fr_third !!}</textarea>
                                @if($errors->has('fr_third'))
                                    <span class="text-danger">{{ $errors->first('fr_third') }}</span>
                                @endif
                            </div>

                        </div>
                        </div>
                        </div>

                        </div>
                    </div>

                  <hr>
                  <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>



<div class="card">
    <div class="card-header">
       Messages for successful password update
    </div>

    <div class="card-body">
        <div class="col-12">

            <form method="POST" action="{{ route("admin.emailtexts") }}" enctype="multipart/form-data">
                @csrf
            <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home4" role="tab" aria-controls="custom-tabs-four-home4" aria-selected="true">Eng</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile4" role="tab" aria-controls="custom-tabs-four-profile4" aria-selected="false">Nl</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages4" role="tab" aria-controls="custom-tabs-four-messages4" aria-selected="false">Esp</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings4" role="tab" aria-controls="custom-tabs-four-settings4" aria-selected="false">Fr</a>
            </li>
            </ul>
            </div>
            <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-four-home4" role="tabpanel" aria-labelledby="custom-tabs-four-home4-tab">

                <div class="form-group">
                    <textarea class="form-control ckeditor {{ $errors->has('en_success') ? 'is-invalid' : '' }}" name="en_success" id="en_success">{!! $emailContents->en_success !!}</textarea>
                    @if($errors->has('en_success'))
                        <span class="text-danger">{{ $errors->first('en_success') }}</span>
                    @endif
                </div>

            </div>
            <div class="tab-pane fade" id="custom-tabs-four-profile4" role="tabpanel" aria-labelledby="custom-tabs-four-profile4-tab">


                <div class="form-group">
                    <textarea class="form-control ckeditor {{ $errors->has('nl_success') ? 'is-invalid' : '' }}" name="nl_success" id="nl_success">{!! $emailContents->nl_success !!}</textarea>
                    @if($errors->has('nl_success'))
                        <span class="text-danger">{{ $errors->first('nl_success') }}</span>
                    @endif
                </div>


            </div>
            <div class="tab-pane fade" id="custom-tabs-four-messages4" role="tabpanel" aria-labelledby="custom-tabs-four-messages4-tab">



                <div class="form-group">
                    <textarea class="form-control ckeditor {{ $errors->has('es_success') ? 'is-invalid' : '' }}" name="es_success" id="es_success">{!! $emailContents->es_success !!}</textarea>
                    @if($errors->has('es_success'))
                        <span class="text-danger">{{ $errors->first('es_success') }}</span>
                    @endif
                </div>

            </div>
            <div class="tab-pane fade" id="custom-tabs-four-settings4" role="tabpanel" aria-labelledby="custom-tabs-four-settings4-tab">


                <div class="form-group">
                    <textarea class="form-control ckeditor {{ $errors->has('fr_success') ? 'is-invalid' : '' }}" name="fr_success" id="fr_success">{!! $emailContents->fr_success !!}</textarea>
                    @if($errors->has('fr_success'))
                        <span class="text-danger">{{ $errors->first('fr_success') }}</span>
                    @endif
                </div>

            </div>
            </div>
            </div>

            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.company.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Company">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.company.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.lng') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.logo_white') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.logo_color') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.favicon') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.logo') }}
                        </th>
                        <th>
                            Levels Global Cost
                        </th>
                        <th>
                            Landmarks Global Cost
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $key => $company)
                        <tr data-entry-id="{{ $company->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $company->id ?? '' }}
                            </td>
                            <td>
                                {{ $company->name ?? '' }}
                            </td>
                            <td>
                                {{ $company->email ?? '' }}
                            </td>
                            <td>
                                {{ $company->phone ?? '' }}
                            </td>
                            <td>
                                {{ $company->lat ?? '' }}
                            </td>
                            <td>
                                {{ $company->lng ?? '' }}
                            </td>
                            <td>
                                @if($company->logo_white)
                                    <a href="{{ $company->logo_white->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $company->logo_white->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($company->logo_color)
                                    <a href="{{ $company->logo_color->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $company->logo_color->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($company->favicon)
                                    <a href="{{ $company->favicon->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($company->logo)
                                    <a href="{{ $company->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $company->logo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $company->level_cost ?? '' }}
                            </td>
                            <td>
                                {{ $company->landmark_cost ?? '' }}
                            </td>
                            <td>
                                @can('company_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.companies.show', $company->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('company_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.companies.edit', $company->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('company_delete')
                                    <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
<script src="../plugins/jquery/jquery.min.js"></script>
</script>
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('company_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.companies.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Company:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})


</script>
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.blogs.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $blog->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection
