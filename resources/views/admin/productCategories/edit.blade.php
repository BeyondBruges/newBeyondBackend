@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Product Category Edit
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-categories.update", $productCategory->id) }}" enctype="multipart/form-data">
               @method('PUT')
            @csrf
                <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.language.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{$productCategory->name}}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.language.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                  Update
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')


@endsection