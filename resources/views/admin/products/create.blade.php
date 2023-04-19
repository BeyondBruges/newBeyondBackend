@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">Name key</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">This have to be added to the localization table</span>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
                <span class="help-block">Create a key to identify this product internally  <strong>use "_" instead of spaces </strong> </span>

            </div>
            <div class="form-group">
                <label class="required" for="description_key">Description key</label>
                <input class="form-control {{ $errors->has('description_key') ? 'is-invalid' : '' }}" type="text" name="description_key" id="description_key" value="{{ old('description_key', '') }}" required>
                @if($errors->has('description_key'))
                    <span class="text-danger">This have to be added to the localization table</span>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
                <span class="help-block">Create a key to identify this product internally  <strong>use "_" instead of spaces </strong> </span>

            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.product.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stock">{{ trans('cruds.product.fields.stock') }}</label>
                <input class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" type="number" name="stock" id="stock" value="{{ old('stock', '0') }}" step="1">
                @if($errors->has('stock'))
                    <span class="text-danger">{{ $errors->first('stock') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.stock_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cost">{{ trans('cruds.product.fields.cost') }}</label>
                <input class="form-control {{ $errors->has('cost') ? 'is-invalid' : '' }}" type="number" name="cost" id="cost" value="{{ old('cost', '') }}" step="0.01">
                @if($errors->has('cost'))
                    <span class="text-danger">{{ $errors->first('cost') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.cost_helper') }}</span>
            </div>

<h1>Titles</h1>
<hr>

            <div class="form-group">
                <label for="en_title">English title</label>
                <input class="form-control {{ $errors->has('en_title') ? 'is-invalid' : '' }}" type="text" name="en_title" id="en_title" value="{{ old('en_title', '') }}" required>
                @if($errors->has('en_title'))
                    <span class="text-danger">{{ $errors->first('en_title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="es_title">Spanish title</label>
                <input class="form-control {{ $errors->has('es_title') ? 'is-invalid' : '' }}" type="text" name="es_title" id="es_title" value="{{ old('es_title', '') }}" required>
                @if($errors->has('es_title'))
                    <span class="text-danger">{{ $errors->first('es_title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="nl_title">Dutch title</label>
                <input class="form-control {{ $errors->has('nl_title') ? 'is-invalid' : '' }}" type="text" name="nl_title" id="nl_title" value="{{ old('nl_title', '') }}" required>
                @if($errors->has('nl_title'))
                    <span class="text-danger">{{ $errors->first('nl_title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="fr_title">French title</label>
                <input class="form-control {{ $errors->has('fr_title') ? 'is-invalid' : '' }}" type="text" name="fr_title" id="fr_title" value="{{ old('fr_title', '') }}" required>
                @if($errors->has('fr_title'))
                    <span class="text-danger">{{ $errors->first('fr_title') }}</span>
                @endif
            </div>



<h1>Descriptions</h1>
<hr>
        <div class="form-group">
            <label for="en_description">English Description </label>
            <textarea class="form-control {{ $errors->has('en_description') ? 'is-invalid' : '' }}" name="en_description" id="en_description">{!! old('en_description') !!}</textarea>
            @if($errors->has('en_description'))
                <span class="text-danger">{{ $errors->first('en_description') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="es_description">Spanish Description </label>
            <textarea class="form-control {{ $errors->has('es_description') ? 'is-invalid' : '' }}" name="es_description" id="es_description">{!! old('es_description') !!}</textarea>
            @if($errors->has('es_description'))
                <span class="text-danger">{{ $errors->first('es_description') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="nl_description">Dutch Description </label>
            <textarea class="form-control {{ $errors->has('nl_description') ? 'is-invalid' : '' }}" name="nl_description" id="nl_description">{!! old('nl_description') !!}</textarea>
            @if($errors->has('nl_description'))
                <span class="text-danger">{{ $errors->first('nl_description') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="fr_description">French Description </label>
            <textarea class="form-control {{ $errors->has('fr_description') ? 'is-invalid' : '' }}" name="fr_description" id="fr_description">{!! old('fr_description') !!}</textarea>
            @if($errors->has('fr_description'))
                <span class="text-danger">{{ $errors->first('fr_description') }}</span>
            @endif
        </div>

<hr>


            <div class="form-group">
                <label class="required" for="product_category">{{ trans('cruds.analytic.fields.type') }}</label>
                <select class="form-control select {{ $errors->has('type') ? 'is-invalid' : '' }}" name="product_category" id="product_category" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $entry->id }}" {{ old('product_category') == $id ? 'selected' : '' }}>{{ $entry->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.analytic.fields.type_helper') }}</span>
            </div>

             <div class="form-group">
                <label class="required" for="status">Status</label>
                <select class="form-control select {{ $errors->has('type') ? 'is-invalid' : '' }}" name="status" id="status">
                <option value="1" {{ old('status') == $id ? 'selected' : '' }}>Available</option>

                <option value="0" >Unavailable</option>
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.analytic.fields.type_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.products.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($product) && $product->image)
      var file = {!! json_encode($product->image) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection
