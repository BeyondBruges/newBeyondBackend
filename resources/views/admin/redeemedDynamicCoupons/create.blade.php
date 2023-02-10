@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Redeem Dynamic Coupon
    </div>


    <div class="card-body">

        @if($dynamicCoupon->status == 1)
        <form method="POST" action="{{ route("admin.redeemed-dynamic-coupons.store") }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
            	<div class="col-4">

            		<img src="{{$dynamicCoupon->products->first() ? $dynamicCoupon->products->first()->image->getUrl()  : ''}}" style="width:100%">

            	</div>
            	<div class="col-8">
            	            <div class="form-group">
                <label class="required" for="title">Dynamic Coupon</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="couponname" id="title" value="{{ $dynamicCoupon->name }}" readonly>

                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="coupon_id" id="title" value="{{ $dynamicCoupon->id }}" hidden>

                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.title_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="value">User</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="dynamic_coupon_name" id="value" value="{{ $dynamicCoupon->user->name }}" readonly>

<input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="dynamic_coupon_id" id="value" value="{{ $dynamicCoupon->id }}" hidden>

                @if($errors->has('value'))
                    <span class="text-danger">{{ $errors->first('value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.value_helper') }}</span>
            </div>

            <div class="form-group">
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="user_id" id="value" value="{{ $dynamicCoupon->user->id }}" hidden>
                @if($errors->has('value'))
                    <span class="text-danger">{{ $errors->first('value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.value_helper') }}</span>
            </div>
            	</div>


            	<div class="col-12">
            		            <div class="form-group">
                <label class="required" for="partner_id">{{ trans('cruds.coupon.fields.partner') }}</label>
                <select class="form-control select2 {{ $errors->has('partner') ? 'is-invalid' : '' }}" name="partner_id" id="partner_id" required>
                    @foreach($loggedUser->userPartnerUsers as $id => $entry)
                        <option value="{{ $entry->partner->id }}" {{ old('partner_id') == $id ? 'selected' : '' }}>{{ $entry->partner->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('partner'))
                    <span class="text-danger">{{ $errors->first('partner') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.partner_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                   Redeem Coupon
                </button>
            </div>
            	</div>

            </div>



        </form>
        @else
        <h1>This product has already been redeemed</h1>
        <h2>Please try scanning another code</h2>
        @endif
    </div>
</div>



@endsection

@section('scripts')
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
                xhr.open('POST', '{{ route('admin.coupons.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $coupon->id ?? 0 }}');
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
